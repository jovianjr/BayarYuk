<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('password');
            $table->string('app_key')->unique()->nullable();
            $table->string('callback_url_success')->unique()->nullable();
            $table->string('callback_url_failed')->unique()->nullable();
            $table->rememberToken();
            $table->string('account_type', 255)->default('normal');
            $table->decimal('balance', 20, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
