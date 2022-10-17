<?php

namespace App\Jobs;

use App\DTO\TransactionDTO;
use App\Enum\TransactionType;
use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class CreateTransactionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly TransactionDTO $transactionDTO,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        DB::beginTransaction();

        $account = $this->transactionDTO->getAccount();

        if ($this->transactionDTO->getTransactionType() === TransactionType::FUNDS_IN->value) {
            $account->value += $this->transactionDTO->getValue();
        } else {
            $account->value -= $this->transactionDTO->getValue();
        }

        $account->save();

        $transaction = new Transaction();

        $transaction->description = $this->transactionDTO->getDescription();
        $transaction->value = $this->transactionDTO->getValue();
        $transaction->account_id = $account->id;
        $transaction->type = $this->transactionDTO->getTransactionType();

        $transaction->save();

        DB::commit();
    }
}
