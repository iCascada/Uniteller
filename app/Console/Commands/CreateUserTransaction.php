<?php

namespace App\Console\Commands;

use App\DTO\TransactionDTO;
use App\Enum\TransactionType;
use App\Jobs\CreateTransactionJob;
use App\Models\Account;
use App\Services\UserService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateUserTransaction extends Command
{
    public function __construct(private UserService $userService){
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user transaction';

    private float $defaultTransactionValue = 1000;
    private string $defaultTransactionDescription = 'Personal transaction';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $email = $this->ask('Enter login');

        $validator = Validator::make(
            ['email' => $email],
            ['email' => ['required', 'email']]
        );

        // Check some validation error's
        if ($validator->fails()) {
            $this->error('Email is incorrect');

            $this->handle();
        }

        // If service has some trouble's or mb other db problem
        try {
            $user = $this->userService->findByEmail($email);
        } catch (\Throwable $e) {
            $this->error('Service error. Try later');

            return self::FAILURE;
        }

        // If user not found
        if (!$user) {
            $this->error('Login is invalid');

            $this->handle();
        }

        $transactionType = $this->choice(
            'Transaction type', TransactionType::types(),
            TransactionType::FUNDS_IN->value
        );

        /** @var Account $account */
        $account = $user->account;

        /**
         * Generally, account creation is linked to user registration.
         * If for some reason the account does not exist, we catch it
         */
        if (!$account) {
            $this->error('Account not found');

            return self::FAILURE;
        }

        if ($transactionType === TransactionType::FUNDS_OUT->value && !$account->value) {
            $this->error('The balance is empty. Operation finds out is forbidden');

            return self::FAILURE;
        }

        $value = (float)$this->ask('Amount ?', $this->defaultTransactionValue);

        if ($transactionType === TransactionType::FUNDS_OUT->value && $value > $account->value) {
            $this->error('Not enough money on the balance sheet. Operation finds out is forbidden');

            return self::FAILURE;
        }

        $description = $this->ask('Description ?', $this->defaultTransactionDescription);

        CreateTransactionJob::dispatchSync(
            (new TransactionDTO())
            ->setValue($value)
            ->setAccount($account)
            ->setDescription($description)
            ->setTransactionType($transactionType)
        );

        $this->info('The transaction is being processed...');

        return self::SUCCESS;
    }
}
