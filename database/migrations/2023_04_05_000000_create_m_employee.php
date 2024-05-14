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
        Schema::create('m_employee', function (Blueprint $table) {
            $table->char('emp_id', 6);
            $table->string('emp_name', 30);
            $table->char('dept', 4);
            $table->tinyInteger('grade');
            $table->string('pos', 60);
            $table->string('email', 30);
            $table->date('join');
            $table->date('exit')->nullable();
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['emp_id']);
            $table->index(['emp_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_employee');
    }
};
