<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->string('phone_number', 15);
            $table->string('email', 255);
            $table->string('name', 255);
            $table->string('photo', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        $this->seedCustomers();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }

    /**
     * Seed dummy data for customers.
     *
     * @return void
     */
    private function seedCustomers()
    {
        DB::table('customers')->insert([
            [
                'id' => '849d37f1-9e6b-4fb7-93d6-384e780a0650',
                'phone_number' => '1234567890',
                'email' => 'customer1@example.com',
                'name' => 'John Doe',
                'photo' => 'photo1.jpg',
                'address' => '123 Main St, City',
                'birth_date' => '1990-01-15',
                'birth_place' => 'City A',
                'created_at' => '2023-05-22 10:00:00',
            ],
            [
                'id' => '7b52cb18-7462-4e2c-8d4c-c3d6636f8e85',
                'phone_number' => '9876543210',
                'email' => 'customer2@example.com',
                'name' => 'Jane Smith',
                'photo' => 'photo2.jpg',
                'address' => '456 Park Ave, Town',
                'birth_date' => '1992-06-30',
                'birth_place' => 'Town B',
                'created_at' => '2023-05-23 15:30:00',
            ],
        ]);
    }
}
