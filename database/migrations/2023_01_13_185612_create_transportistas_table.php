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
        Schema::create('transportistas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('company_name')->nullable(false);
            $table->string('identification')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('state')->nullable(false);
            $table->string('country')->nullable(false);
            $table->string('zip')->nullable(false);
            $table->string('address')->nullable(false);

            $table->string('phone')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('status')->nullable(false);
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
        Schema::dropIfExists('transportistas');
    }
};
