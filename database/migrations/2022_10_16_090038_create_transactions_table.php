<?php

use App\Enum\TransactionType;
use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->float('value');
            $table->text('description')->nullable();
            $table->enum('type', TransactionType::types());
            $table->foreignIdFor(Account::class);
            $table->timestamps();
            $table->index('created_at');
            $table->fullText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
};
