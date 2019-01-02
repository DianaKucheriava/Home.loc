<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateStateCityTables extends Migration
{
   public function up()
   {
        Schema::create('country', function(Blueprint $table){
            $table->increments('id_country');
            $table->string('country');
            $table->timestamps();
        });
        Schema::create('region', function (Blueprint $table) {
            $table->increments('id_region');
            $table->string('region');
            $table->integer('id_country');
            $table->timestamps();
        });
        Schema::create('city', function (Blueprint $table) {
            $table->increments('id_city');
            $table->string('city');
            $table->integer('id_country');
            $table->integer('id_region');
            $table->timestamps();
        });
   }
   public function down()
   {
       Schema::drop('cities');
       Schema::drop('region');
       Schema::drop('country');
   }
}
?>