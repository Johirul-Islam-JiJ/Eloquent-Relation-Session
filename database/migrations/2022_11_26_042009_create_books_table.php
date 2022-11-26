<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publisher_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->date('publishing_date');
            $table->date('latest_printing_date');
            $table->string('isbn')->unique();
            $table->string('cover_image')->nullable();
            $table->string('edition')->nullable();
            $table->decimal('price')->unsigned()->nullable();
            $table->integer('pages')->unsigned()->nullable();
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
        Schema::dropIfExists('books');
    }
}
