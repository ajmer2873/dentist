<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name',25);
            $table->string('last_name',25);
            $table->string('email',80)->unique();
            $table->string('password',255);
            $table->enum('role',['0','1'])->default('0');
            $table->string('state',35);
            $table->string('city',35);
            $table->integer('zip')->unsigned();
            $table->string('address',70);
            $table->enum('status',['0','1'])->default('0');
            $table->timestamps();
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