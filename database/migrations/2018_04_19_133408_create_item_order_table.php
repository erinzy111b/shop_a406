<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_order', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned()->index();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->bigInteger('item_id')->unsigned()->index();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->integer('qty')->default(1);   //商品數量
            $table->string('option',100)->nullable();   //商品選項
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_order', function(Blueprint $table)
        {
            $table->dropForeign(['item_id']);
            $table->dropForeign(['order_id']);
        });
        Schema::dropIfExists('item_order');
    }
}
