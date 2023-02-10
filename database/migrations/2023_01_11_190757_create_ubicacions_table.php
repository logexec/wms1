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
        Schema::create('ubicacions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('account_id')->nullable(false);
            $table->integer('warehouse_id')->nullable(false);
            $table->decimal('width',10,6)->nullable(false);
            $table->decimal('high',10,6)->nullable(false);
            $table->decimal('long',10,6)->nullable(false);            
            $table->string('sku')->nullable();
            $table->integer('ranking')->nullable();
            $table->integer('total_pallets')->nullable(false);
            $table->string('status')->default('ACTIVA');
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
        Schema::dropIfExists('ubicacions');
    }
};
