<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('desc')->nullable();
            $table->text('content')->nullable();
            $table->text('tags')->nullable();
            $table->foreignId('subject_id')->nullable()->constrained('subjects');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('chapter')->nullable();
            $table->integer('type')->nullable();
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
        Schema::dropIfExists('notes');
    }
}
