<?php

namespace App\Http\Controllers\Traits;

use App\Models\Account;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

trait HasAccountData
{
    private ?Account $account = null;
    private ?Collection $transactions = null;

    public function __construct(private TransactionService $transactionService) {}

    public function getAccount(): Account
    {
        if ($this->account) {
            return $this->account;
        }

        $this->account = Auth::user()->account;

        /**
         * Generally, account creation is linked to user registration.
         * If for some reason the account does not exist, we catch it
         */
        if (!$this->account) {
            throw new \LogicException();
        }

        return $this->account;
    }

    /**
     * @return Collection<Transaction>
     */
    public function getTransactions(int|float $limit = 5, array $orderBy = ['id', 'desc']): Collection
    {
        if ($this->transactions) {
            return $this->transactions;
        }

        $this->transactions = $this->transactionService->findByAccount($this->getAccount(), $limit, $orderBy);

        return $this->transactions;
    }
}
