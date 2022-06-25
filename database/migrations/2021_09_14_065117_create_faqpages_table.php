<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqpages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pages_id')->nullable()->constrained();
            $table->string('banner_background_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('content_heading')->nullable();
            $table->string('content_sub_heading')->nullable();
            $table->text('content_text')->nullable();            

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
        Schema::dropIfExists('faqpages');
    }
}
