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
        Schema::create('m_bom', function (Blueprint $table) {
            $table->char('sku', 6);
            $table->char('ver', 5);
            $table->integer('total_weight')->nullable();
            $table->char('parent_sku', 6)->nullable();
            $table->boolean('producible');
            $table->boolean('assorted');
            $table->tinyInteger('cooking_method');
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['sku', 'ver']);
            $table->index(['sku', 'ver']);

            // $table->char('bom', 6);
            // $table->string('bom_name', 50);
            // $table->tinyInteger('status');
            // $table->timestamp('created_at', $precision = 0);
            // $table->char('created_by', 6);
            // $table->timestamp('updated_at', $precision = 0);
            // $table->char('updated_by', 6);
            // $table->primary(['bom']);
            // $table->index(['bom']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_bom');
    }
};
