<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('from_account_id', 36);
            $table->string('to_account_id', 36);
            $table->decimal('amount', 20, 2);
            $table->string('description', 255);
            $table->datetime('created_at');
            $table->datetime('deleted_at')->nullable();
        });

        $this->seedTransactions();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }

    /**
     * Seed dummy data for transactions.
     *
     * @return void
     */
    private function seedTransactions()
    {
        DB::table('transactions')->insert([
            [
                'id' => 'd9afcd71-703b-4d71-9db2-8c546cf57f42',
                'from_account_id' => '849d37f1-9e6b-4fb7-93d6-384e780a0650',
                'to_account_id' => '7b52cb18-7462-4e2c-8d4c-c3d6636f8e85',
                'amount' => 500.00,
                'description' => 'Transfer',
                'created_at' => '2023-05-22 11:00:00',
            ],
            [
                'id' => 'a1553089-6d0c-4c15-a7e1-76abed6c1a75',
                'from_account_id' => '849d37f1-9e6b-4fb7-93d6-384e780a0650',
                'to_account_id' => '7b52cb18-7462-4e2c-8d4c-c3d6636f8e85',
                'amount' => 200.00,
                'description' => 'Transfer',
                'created_at' => '2023-05-23 16:00:00',
            ],
            [
                'id' => 'f27fd1e9-453b-4bc5-b208-59b59a015c97',
                'from_account_id' => '7b52cb18-7462-4e2c-8d4c-c3d6636f8e85',
                'to_account_id' => '849d37f1-9e6b-4fb7-93d6-384e780a0650',
                'amount' => 1000.00,
                'description' => 'Payment',
                'created_at' => '2023-05-24 10:30:00',
            ],
        ]);
    }
}
