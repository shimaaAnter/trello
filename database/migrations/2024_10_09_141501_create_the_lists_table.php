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
        Schema::create('the_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('boarde_id')->unsigned();
            $table->foreign('boarde_id')->references('id')->on('boardes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lests');
    }
};
