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
        Schema::create('vehiculos', function (Blueprint $table) {
            
            $table->id();
            $table->string('name')->nullable(false);            
            $table->decimal('weight',10,6)->nullable(false);            
            $table->string('um_weight')->nullable(false);            
            $table->decimal('volume',10,6)->nullable(false);            
            $table->string('um_volume')->nullable(false);                     
            $table->integer('pallets')->nullable(false);
            $table->string('status')->default('ACTIVO');
            $table->integer('account_id')->nullable(false);            
            $table->integer('created_by')->nullable();                    
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('vehiculos');
    }
};
