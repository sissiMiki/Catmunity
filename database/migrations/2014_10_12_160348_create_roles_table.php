<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {

            //$table->engine = 'InnoDB';
            $table->Increments('id');
            //$table->foreignId('user_id')->constrained();
            //$table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->string('name');
            $table->timestamps();

            $table->unsignedInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });


   /* Schema::create('roles', function($table)
    {




});*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
  /* public function down()

    {
        Schema::dropIfExists('roles');
    }
    */

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_role_id_foreign');
            $table->dropColumn('role_id');
        });

    }
}
