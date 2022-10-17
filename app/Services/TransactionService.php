<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;

class TransactionService
{
    public function __construct(
        private readonly Transaction $transaction
    ) {}

    /**
     * @return Collection<Transaction>
     */
    public function findAll(): Collection
    {
        return $this->transaction::all();
    }

    /**
     * @param Account $account
     * @param int|float $limit
     * @param array $orderBy
     * @return Collection
     */
    public function findByAccount(Account $account, int|float $limit, array $orderBy): Collection
    {
        $transactions = Transaction::where('account_id', $account->id)->orderBy(...$orderBy);

        if ($limit !== INF) {
            $transactions->limit($limit);
        }

        return $transactions->get();
    }
}
