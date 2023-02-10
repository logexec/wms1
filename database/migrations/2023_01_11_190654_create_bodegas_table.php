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
        Schema::create('bodegas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('account_id');
            $table->string('email')->nullable(false);            
            $table->string('phone')->nullable();
            $table->string('responsible')->nullable(false);            
            $table->string('status')->nullable(false);

            $table->decimal('m3',10,6)->nullable(false);
            $table->decimal('m2',10,6)->nullable(false);
            $table->decimal('pallet_capacity',10,6)->nullable(false);

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
        Schema::dropIfExists('bodegas');
    }
};
