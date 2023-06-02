<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('from_account_id', 36);
            $table->string('to_account_id', 36);
            $table->decimal('amount', 20, 2);
            $table->string('payment_code', 40)->nullable();
            $table->string('status', 40)->default('WAITING');
            $table->timestamps();
            $table->softDeletes();
        });

        $this->seedPayments();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }

    /**
     * Seed dummy data for transactions.
     *
     * @return void
     */
    private function seedPayments()
    {
        DB::table('payments')->insert([
            [
                'id' => 'd9afcd71-703b-4d71-9db2-8c546cf57f42',
                'from_account_id' => '849d37f1-9e6b-4fb7-93d6-384e780a0650',
                'to_account_id' => '7b52cb18-7462-4e2c-8d4c-c3d6636f8e85',
                'amount' => 5000.00,
                'payment_code' => '8892MVCKEN',
                'created_at' => '2023-05-22 11:00:00',
            ],
            [
                'id' => 'a1553089-6d0c-4c15-a7e1-76abed6c1a75',
                'from_account_id' => '849d37f1-9e6b-4fb7-93d6-384e780a0650',
                'to_account_id' => '7b52cb18-7462-4e2c-8d4c-c3d6636f8e85',
                'amount' => 200.00,
                'payment_code' => '8892034',
                'created_at' => '2023-05-23 16:00:00',
            ],
            [
                'id' => 'f27fd1e9-453b-4bc5-b208-59b59a015c97',
                'from_account_id' => '7b52cb18-7462-4e2c-8d4c-c3d6636f8e85',
                'to_account_id' => '849d37f1-9e6b-4fb7-93d6-384e780a0650',
                'amount' => 1000.00,
                'payment_code' => '885JX',
                'created_at' => '2023-05-24 10:30:00',
            ],
        ]);
    }
}
