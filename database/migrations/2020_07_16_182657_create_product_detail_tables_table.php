<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_detail_tables', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('logo')->nullable();
            $table->string('name')->nullable();
            $table->string('tagline')->nullable();
            $table->text('motivation')->nullable();
            $table->string('web_link')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('start_date_month')->nullable();
            $table->string('start_date_year')->nullable();
            $table->string('end_date_month')->nullable();
            $table->string('end_date_year')->nullable();
            $table->string('location')->nullable();
            $table->string('founder_skillset')->nullable();
            $table->string('no_of_founders')->nullable();
            $table->string('initial_commitment')->nullable();
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
        Schema::dropIfExists('product_detail_tables');
    }
}
