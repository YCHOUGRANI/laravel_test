<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  


          Schema::create('addresses', function (Blueprint $table) {
            	$table->increments('id');
            	$table->string('address');
		$table->string('town');
		$table->string('country');
		$table->string('post_code');
            	$table->integer('contact_id')->unsigned();
            	$table->foreign('contact_id')
                ->references('id')
                ->on('contacts');
           $table->timestamps();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('orders', function (Blueprint $table) {
                $table->increments('id');
                $table->string('quantity')->nullable();	
        	$table->float('price')->nullable();
		$table->string('desc')->nullable();
		$table->string('status')->nullable();
                $table->string('payment_status')->nullable();
                $table->string('voucher_code')->nullable();
            	$table->integer('company_id')->unsigned();
            	 $table->foreign('company_id')
                ->references('id')
                ->on('companies');
                $table->integer('contact_id')->unsigned();
            	 $table->foreign('contact_id')
                ->references('id')
                ->on('contacts');
                $table->timestamps();
        });

	  Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('order_id')->unsigned();
             $table->foreign('order_id')
                ->references('id')
                ->on('orders');
             $table->integer('item_id')->unsigned();
             $table->foreign('item_id')
                ->references('id')
                ->on('items');

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
        Schema::dropIfExists('items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('addresses');

    }
}
