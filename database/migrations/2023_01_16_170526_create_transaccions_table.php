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
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('account_id')->unsigned()->nullable(false);  
            $table->foreign('account_id')->references('id')->on('cuentas')->onDelete('cascade');            

            $table->bigInteger('tcode_id')->unsigned()->nullable(false);  
            $table->foreign('tcode_id')->references('id')->on('tipotransaccions')->onDelete('cascade');            

            $table->bigInteger('prod_id')->unsigned()->nullable(false);  
            $table->foreign('prod_id')->references('id')->on('productos')->onDelete('cascade');            

            $table->bigInteger('warehouse_id')->unsigned()->nullable(false);  
            $table->foreign('warehouse_id')->references('id')->on('bodegas')->onDelete('cascade');                        

            $table->bigInteger('ubic_ori_id')->unsigned()->nullable(false);  
            $table->foreign('ubic_ori_id')->references('id')->on('ubicacions')->onDelete('cascade');                        

            $table->bigInteger('ubic_des_id')->unsigned()->nullable(false);  
            $table->foreign('ubic_des_id')->references('id')->on('ubicacions')->onDelete('cascade');                        
            
            $table->bigInteger('doc_id')->unsigned()->nullable(false);  
            $table->foreign('doc_id')->references('id')->on('doccabs')->onDelete('cascade');                        
            
            $table->string('batch')->nullable(false);
            $table->string('um')->nullable(false);
            $table->string('serial')->nullable(false);
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
        Schema::dropIfExists('transaccions');
    }
};
