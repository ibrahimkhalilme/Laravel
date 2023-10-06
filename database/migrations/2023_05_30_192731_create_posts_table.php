<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** Class 28
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Class 78 Foreign_ID without constrained
            // $table->integer('user_id');

            // Class 79 Foreign_ID with constrained
            $table->foreignId('user_id')->constrained();

            // Class 33
            // $table->foreignId('user_id')->constrained('users');

            // Class 28
            $table->string('title');
            $table->text('description');

            // Class 29
            $table->boolean('is_publish')->default(false);

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
        Schema::dropIfExists('posts');
    }
};
