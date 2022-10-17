<?php

namespace App\DTO;

use App\Models\Account;

class TransactionDTO
{
    private Account $account;
    private string $transactionType;
    private string $description;
    private float $value;

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @param Account $account
     * @return TransactionDTO
     */
    public function setAccount(Account $account): TransactionDTO
    {
        $this->account = $account;
        return $this;
    }

    public function getTransactionType(): string
    {
        return $this->transactionType;
    }

    /**
     * @param string $transactionType
     * @return TransactionDTO
     */
    public function setTransactionType(string $transactionType): TransactionDTO
    {
        $this->transactionType = $transactionType;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return TransactionDTO
     */
    public function setDescription(string $description): TransactionDTO
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return TransactionDTO
     */
    public function setValue(float $value): TransactionDTO
    {
        $this->value = $value;

        return $this;
    }
}
