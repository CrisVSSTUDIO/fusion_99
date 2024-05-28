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
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('filetype');
            $table->float('filesize');
            $table->string('filetype_prediction')->nullable();
            $table->text('upload')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete("cascade");
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->index(['created_at', 'updated_at','category_id']);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
