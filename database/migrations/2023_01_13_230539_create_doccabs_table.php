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
        Schema::create('doccabs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('type')->nullable(false);

            

            $table->bigInteger('account_id')->unsigned()->nullable(false);  
            $table->foreign('account_id')->references('id')->on('cuentas')->onDelete('cascade');            
            $table->bigInteger('solicitante_id')->unsigned();
            $table->foreign('solicitante_id')->references('id')->on('solicitantes')->onDelete('cascade');
            $table->bigInteger('destinatario_id')->unsigned();
            $table->foreign('destinatario_id')->references('id')->on('destinatarios')->onDelete('cascade');
            $table->bigInteger('warehouse_id')->unsigned();
            $table->foreign('warehouse_id')->references('id')->on('bodegas')->onDelete('cascade');

            

            $table->bigInteger('route_id')->unsigned()->nullable(true)->default('0');            
            
            $table->string('status')->nullable(false);
            $table->string('order_creator_user')->nullable();
            $table->string('doc_creator_user')->nullable();
            $table->date('order_date')->nullable();
            $table->date('record_date')->nullable();
            $table->date('start_doc_date')->nullable();
            $table->dateTime('start_doc_date_hour')->nullable();
            $table->date('finish_doc_date')->nullable();
            $table->dateTime('finish_doc_date_hour')->nullable();
            $table->string('point_sale')->nullable();
            $table->string('sales_channel')->nullable();

            $table->decimal('total_qty',10,6)->unsigned()->nullable();
            $table->decimal('total_weight',10,6)->unsigned()->nullable();
            $table->decimal('total_volume',10,6)->unsigned()->nullable();
            $table->string('order_number')->nullable()->nullable();
            $table->string('purchase_number')->nullable()->nullable();
            $table->string('comments')->nullable()->nullable();
            $table->string('invoice_number')->nullable()->nullable();
            $table->string('invoice_auth_number')->nullable()->nullable();
            $table->string('invoice_print_date')->nullable()->nullable();
            $table->string('erp_invoice_number')->nullable()->nullable();
            $table->unique(['account_id', 'name'])->nullable(false);
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
        Schema::dropIfExists('doccabs');
    }
};
