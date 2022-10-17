<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;

class AccountService
{
    public function __construct(private readonly Account $account) {}

    /**
     * @return Collection<Account>
     */
    public function findAll(): Collection
    {
        return $this->account::all();
    }
}
