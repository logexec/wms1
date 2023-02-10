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
        Schema::create('docdets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);            
            $table->bigInteger('account_id')->unsigned()->nullable(false);  
            $table->foreign('account_id')->references('id')->on('cuentas')->onDelete('cascade');            
            $table->bigInteger('doccab_id')->unsigned();
            $table->foreign('doccab_id')->references('id')->on('doccabs')->onDelete('cascade');            
            $table->bigInteger('warehouse_id')->unsigned();
            $table->foreign('warehouse_id')->references('id')->on('bodegas')->onDelete('cascade');
            $table->bigInteger('prod_id')->unsigned();
            $table->foreign('prod_id')->references('id')->on('productos')->onDelete('cascade');
            $table->string('material_code')->nullable();
            $table->string('material_det')->nullable();

            $table->string('batch')->nullable(false);
            $table->string('barcode')->nullable();            

            $table->decimal('total_req',10,6)->unsigned()->nullable(false);            
            $table->string('um_total_req')->nullable(false);

            $table->decimal('total_req_weight',10,6)->unsigned()->nullable(false);            
            $table->string('um_total_req_weight')->nullable(false);

            $table->decimal('total_req_volume',10,6)->unsigned()->nullable(false);            
            $table->string('um_total_req_volume')->nullable(false);

            $table->decimal('total_pre',10,6)->unsigned()->nullable(true)->default(0);
            $table->decimal('total_con',10,6)->unsigned()->nullable(true)->default(0);

            $table->longText('comments')->nullable()->nullable();
            
            $table->unique(['account_id','doccab_id','batch','name','id'])->nullable(false);
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
        Schema::dropIfExists('docdets');
    }
};
