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
        Schema::create('solicitantes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('company_name')->nullable(false);
            $table->string('fiscal_identification')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('state')->nullable(false);
            $table->string('country')->nullable(false);
            $table->string('zip')->nullable(false);
            $table->string('address')->nullable(false);
            $table->decimal('lat',10,6)->nullable(false);
            $table->decimal('lon',10,6)->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('email')->nullable(false);
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
        Schema::dropIfExists('solicitantes');
    }
};
