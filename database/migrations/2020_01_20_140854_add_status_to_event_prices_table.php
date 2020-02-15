<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToEventPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_prices', function (Blueprint $table) {
            $table->enum('status',['Satışta','Satış Yetkisi Yok','Satışa Kapalı','Tükendi','Sadece Gişede'])->default('Satış Yetkisi Yok');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_prices', function (Blueprint $table) {
            //
        });
    }
}
