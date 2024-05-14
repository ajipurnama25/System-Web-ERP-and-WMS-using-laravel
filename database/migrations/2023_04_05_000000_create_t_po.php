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
        Schema::create('t_po', function (Blueprint $table) {
            $table->char('po_no', 10);
            $table->date('po_date');
            $table->integer('po_amt');
            $table->tinyInteger('top');
            $table->char('pr_no', 10);
            $table->char('supplier', 9);
            $table->char('site', 1);
            $table->date('delv_date', 10);
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['po_no']);
            $table->index(['po_no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_po');
    }
};
