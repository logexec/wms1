<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipotransaccions', function (Blueprint $table) {
            $table->id();
            $table->integer('name')->nullable(false);            
            $table->string('alphacode')->nullable(false);         
            $table->string('description')->nullable(false);            
            $table->string('type')->nullable(false);;
            $table->integer('account_id')->nullable(false);            
            $table->integer('created_by')->nullable();                    
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->unique(['account_id', 'name',]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipotransaccions');
    }
};
