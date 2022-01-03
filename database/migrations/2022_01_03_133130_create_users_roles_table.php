<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {

           $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
           $table->foreignId('role_id')->constrained('roles')->onUpdate('cascade')->onDelete('cascade');
                       //PRIMARY KEYS
           $table->primary(['user_id','role_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('users_roles');
    }
}
