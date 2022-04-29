<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
	public function up()
	{
		Schema::create('roles', function (Blueprint $table) {
			//config create roles, add name table and description
			$table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->timestamps();
		});
	}


	public function down()
	{
		Schema::dropIfExists('roles');
	}
}
