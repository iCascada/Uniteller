<?php

declare(strict_types=1);

namespace App\Enum;

enum TransactionType: string
{
    case FUNDS_IN = 'funds_in';
    case FUNDS_OUT = 'funds_out';

    /**
     * @return array<string>
     */
    public static function types(): array
    {
        return array_map(fn($transactionType) => $transactionType->value, TransactionType::cases());
    }
}
