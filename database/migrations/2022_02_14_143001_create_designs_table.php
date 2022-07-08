<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->nullable()->references('id')->on('galleries')->onDelete('cascade');             
            $table->string('design_name');
            $table->string('design_name_slug')->nullable();
            $table->tinyInteger('design_order')->default(0);
            $table->text('design_description')->nullable();
            $table->text('design_photo_path')->nullable();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active')->default(true);   
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
        Schema::dropIfExists('designs');
    }
}
