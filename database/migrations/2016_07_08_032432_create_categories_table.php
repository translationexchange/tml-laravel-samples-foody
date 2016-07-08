<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('name')->nullable();
            $table->string('locale')->nullable();
            $table->timestamps();
        });

        Schema::table('recipes', function ($table) {
            $table->integer('category_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('recipes', function ($table) {
            $table->dropColumn('category_id');
        });

        Schema::drop('categories');
    }
}
