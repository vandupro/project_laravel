<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderForeignKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('ship_id')->references('id')->on('ships')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
