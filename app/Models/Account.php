<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read $id;
 * @property float $value;
 * @property int $user_id;
 */
class Account extends Model
{
    use HasFactory;
}
