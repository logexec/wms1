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
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('name')->nullable(false);
            
            $table->bigInteger('account_id')->unsigned()->nullable(false);  
            $table->foreign('account_id')->references('id')->on('cuentas')->onDelete('cascade');
            
            $table->bigInteger('warehouse_id')->unsigned()->nullable(false);  
            $table->foreign('warehouse_id')->references('id')->on('bodegas')->onDelete('cascade');

            $table->bigInteger('origen_id')->unsigned()->nullable(false);  
            $table->foreign('origen_id')->references('id')->on('destinos')->onDelete('cascade');
            
            $table->bigInteger('destino_id')->unsigned()->nullable(false);  
            $table->foreign('destino_id')->references('id')->on('destinos')->onDelete('cascade');

            $table->bigInteger('vehiculo_id')->unsigned()->nullable(false);  
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');

            $table->bigInteger('transportista_id')->unsigned()->nullable(false);  
            $table->foreign('transportista_id')->references('id')->on('transportistas')->onDelete('cascade');

            $table->string('status')->nullable(false);

            $table->date('upload_date')->nullable(false);            
            $table->dateTime('upload_date_hour')->nullable(false);
            $table->integer('order_upload')->nullable(false);            

            $table->date('start_route')->nullable(false);            
            $table->date('finish_route')->nullable(false);
            
            $table->decimal('total_qty',10,6)->unsigned()->nullable();
            $table->decimal('total_weight',10,6)->unsigned()->nullable();
            $table->decimal('total_volume',10,6)->unsigned()->nullable();
            $table->bigInteger('total_docs')->unsigned()->nullable();

            $table->string('comments')->nullable(true);           
           
                                 
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
        Schema::dropIfExists('rutas');
    }
};
