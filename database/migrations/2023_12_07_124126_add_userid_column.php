<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table('todos',function($table){
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            #constrained method doesnt allow you to create a post 
            #if the author"user" ID doesnt exist in the users table
            #onDelete method deletes all posts linked to a user that deleted his account
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('todos', function($table){
            $table->dropColumn('user_id');
        });
    }
};
