<?php

declare(strict_types=1);

namespace App\Models;

use App\Enum\TransactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read $id;
 * @property float $value;
 * @property string $description;
 * @property TransactionType $type;
 * @property int $account_id;
 */
class Transaction extends Model
{
    use HasFactory;
}
