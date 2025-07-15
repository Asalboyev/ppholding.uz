<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->text('desc1');
            $table->text('desc2');
            $table->text('desc3');
            $table->string('video');
            $table->text('done1');
            $table->text('done2');
            $table->text('done3');
            $table->text('done1_text');
            $table->text('done2_text');
            $table->text('done3_text');
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
        Schema::dropIfExists('about_pages');
    }
}
