<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_categories', function (Blueprint $table) {
            $table->bigIncrements('id',15);
            $table->string('translation_lang',10);  // Language to translate
            $table->integer('translation_of',false,true);  // element id  to translate
            $table->string('name',50);  // Category name
            $table->string('slug',150)->nullable();  // URL SLug to SEO
            $table->string('photo',150)->nullable();  // categroy photo
            $table->enum('active',[1,0])->default(1);
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
        Schema::dropIfExists('main_categories');
    }
}
