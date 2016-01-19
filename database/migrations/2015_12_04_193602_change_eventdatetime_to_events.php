<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeEventdatetimeToEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function($table)
        {
            $table->dropColumn('event_startdate');
            $table->dropColumn('event_starttime');
            $table->dropColumn('event_enddate');
            $table->dropColumn('event_endtime');
            
            $table->dateTime('event_startdatetime');
            $table->dateTime('event_enddatetime');

        });   
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
