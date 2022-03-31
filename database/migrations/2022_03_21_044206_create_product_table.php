<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->string('title', 255)->nullable()->default(null);
            $table->longText('description')->nullable()->default(null);
            $table->decimal('price', 13, 2)->nullable()->default(null);
            $table->integer('order');
            $table->tinyInteger('active')->default('0');
            $table->nullableTimestamps();
            $table->foreign('group_id')
                ->references('id')->on('product_group')
                ->onDelete('no action')
                ->onUpdate('no action');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
