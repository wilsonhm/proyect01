<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       $store_procedure ="DROP PROCEDURE IF EXISTS `get_assistences_by_id`;
            CREATE PROCEDURE `get_assistences_by_id`(IN idx int)
            BEGIN
            SELECT * FROM assistences where id =idx;
            END;";
            \DB::unprepared($store_procedure);
        }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_procedure');
    }
}
