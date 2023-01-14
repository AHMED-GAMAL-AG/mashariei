<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('status')->default(0); // 0 for in progress , 1 done , 2 canceled
            // ->references('id')->on('users')->onDelete('cascade'); if the user(id) deletes the account in the users table delete all his projects
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade'); // to link with the user how added the project must be ib this form user_id
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
        Schema::dropIfExists('projects');
    }
};
