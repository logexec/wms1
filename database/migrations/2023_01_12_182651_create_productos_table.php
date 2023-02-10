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
        Schema::create('productos', function (Blueprint $table) {
            
            $table->id();

            $table->string('name')->unique();
            $table->string('barcode')->unique();
            $table->string('type_barcode')->nullable(false);
            $table->string('sdescription')->nullable(false);
            $table->string('description')->nullable(false);
            $table->string('um_default')->nullable(false);

            $table->longText('specifications')->nullable(true);

            $table->decimal('weight',10,6)->nullable(false);
            $table->string('um_weight')->nullable(false);          

            $table->decimal('volume',10,6)->nullable(false);
            $table->string('um_volume')->nullable(false);   
            
            $table->decimal('width',10,6)->nullable(false);
            $table->string('um_width')->nullable(false); 

            $table->decimal('high',10,6)->nullable(false);
            $table->string('um_high')->nullable(false); 

            $table->decimal('long',10,6)->nullable(false);
            $table->string('um_long')->nullable(false); 

            $table->string('category')->nullable(false);
            $table->string('subcategory')->nullable(false);
            
            $table->string('sref1')->nullable(true);
            $table->string('sref2')->nullable(true);
            $table->string('sref3')->nullable(true);

            $table->decimal('nref1',10,6)->nullable(true);
            $table->decimal('nref2',10,6)->nullable(true);
            $table->decimal('nref3',10,6)->nullable(true);

            $table->decimal('units_box',10,6)->nullable(false);
            $table->decimal('units_pallet',10,6)->nullable(false);
            $table->integer('inventory_days')->nullable(false);            

            $table->string('status')->default('ACTIVO');
            $table->string('serial')->default('NO');
            $table->string('batch')->default('NO');

            $table->integer('account_id')->nullable(false);
            

            $table->timestamps();
            $table->integer('created_by')->nullable();                    
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
