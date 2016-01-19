<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEventdatetimeToEvents extends Migration
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
            $table->date('event_startdate');
            $table->time('event_starttime');
            $table->date('event_enddate');
            $table->time('event_endtime');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function($table)
        {
            $table->dropColumn('event_startdate');
            $table->dropColumn('event_starttime');
            $table->dropColumn('event_enddate');
            $table->dropColumn('event_endtime');
            
        });   
    }
}
