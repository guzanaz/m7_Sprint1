<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VirtualMachine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        //
        Schema::create('virtual_machine',function(Blueprint $table){
            $table-> id();//pk
            //añadir user id como fk
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            //resto de info
            $table-> string('Name');
            $table-> string('OS');
            $table-> string('Version');
            $table-> string('Ram size');
            $table-> string('Disk capacity');
            $table-> longText('Description');
            $table-> timestamps();//created_at updated_at
            $table-> boolean('Power on');
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
        Schema::dropIfExists('virtual_machine');
    }
}
