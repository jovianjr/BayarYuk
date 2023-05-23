<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('account_id', 36)->primary();
            $table->string('customer_id', 36);
            $table->string('password', 255);
            $table->string('account_type', 255);
            $table->decimal('balance', 20, 2);
            $table->datetime('created_at');
            $table->datetime('deleted_at')->nullable();
        });

        $this->seedAccounts();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }

    /**
     * Seed dummy data for accounts.
     *
     * @return void
     */
    private function seedAccounts()
    {
        DB::table('accounts')->insert([
            [
                'account_id' => '4a7b0190-220d-42b3-8e21-9e4305d4b0d1',
                'customer_id' => '849d37f1-9e6b-4fb7-93d6-384e780a0650',
                'password' => 'password123',
                'account_type' => 'normal',
                'balance' => 1000.00,
                'created_at' => '2023-05-22 10:00:00',
            ],
            [
                'account_id' => '874cff94-847e-429e-bd7b-04834f7dd671',
                'customer_id' => '7b52cb18-7462-4e2c-8d4c-c3d6636f8e85',
                'password' => 'abc123',
                'account_type' => 'normal',
                'balance' => 2500.00,
                'created_at' => '2023-05-24 09:45:00',
            ],
        ]);
    }
}
