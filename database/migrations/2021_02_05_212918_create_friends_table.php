<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('friends', function (Blueprint $table) {
			$table->id();
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('friend_id');
      $table->boolean('status')->default(false);
			$table->timestamps();
			$table->unique(['friend_id', 'user_id']);
      $table->foreign('friend_id')->references('id')
      ->on('users')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('user_id')->references('id')
      ->on('users')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('friends');
	}
}
