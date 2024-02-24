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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable;
            $table->date('deadline')->nullable;
            $table->boolean('status');
            // kunci untuk user_idnya
            $table->unsignedBigInteger('user_id');
            // foreign key yang disambungkan ke 'id' yang berada di table 'users'
            // onDelete('cascade') -> kalau users nya dihapus maka table untuk tasks 
            // kepunyaan si users juga akan dihapus
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
};
