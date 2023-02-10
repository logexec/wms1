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
        Schema::create('saldos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_id')->unsigned()->nullable(false);  
            $table->foreign('account_id')->references('id')->on('cuentas')->onDelete('cascade');            

            $table->bigInteger('wharehouse_id')->unsigned()->nullable(false);  
            $table->foreign('wharehouse_id')->references('id')->on('bodegas')->onDelete('cascade');                        

            $table->bigInteger('prod_id')->unsigned()->nullable(false);  
            $table->foreign('prod_id')->references('id')->on('productos')->onDelete('cascade');

            $table->bigInteger('ubic_id')->unsigned()->nullable(false);  
            $table->foreign('ubic_id')->references('id')->on('ubicacions')->onDelete('cascade');     
            
            $table->string('batch')->nullable(false);
            $table->string('um')->nullable(false);
            $table->decimal('qty',10,6)->nullable(false);

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
        Schema::dropIfExists('saldos');
    }
};
