<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdColumnToPeopleData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('people_data', function (Blueprint $table) {

            // drop the relation
            $table->dropForeign('person_id');

            // drop primary key
            $table->dropPrimary();

            // add new column
            $table->char('id', 36);

            // assign new primary key
            $table->primary('id');

            // restore relation
            $table->foreign('person_id')
                ->references('id')->on('people')
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
        Schema::table('people_data', function (Blueprint $table) {
            //
        });
    }
}
