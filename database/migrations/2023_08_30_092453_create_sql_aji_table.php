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
        Schema::create('sql_aji', function (Blueprint $table) {
            $table->string('kode', 3);
            $table->string('name', 225);
            $table->timestamps();
            $table->primary(['kode']);
            $table->index(['kode']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sql_aji');
    }
};
