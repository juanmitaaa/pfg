<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('user_id');//tiene que ser el mismo tipo de datos que la clave primaria en la otra tabla
            $table->unsignedBigInteger('role_id');//tiene que ser el mismo tipo de datos que la clave primaria en la otra tabla

            $table->foreign('user_id')->references('id')->on('users');//creación de la relación en MYSQL
            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('role_user');
    }
}
