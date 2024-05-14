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
        Schema::create('m_rm_cat_type', function (Blueprint $table) {
            $table->smallInteger('rm_cat_type');
            $table->string('cat_name', 50);
            $table->tinyInteger('wh_anterum_without_pid');
            $table->tinyInteger('wh_anterum_with_pid');
            $table->tinyInteger('wh_storage');
            $table->timestamp('created_at', $precision = 0);
            $table->char('created_by', 6);
            $table->timestamp('updated_at', $precision = 0);
            $table->char('updated_by', 6);
            $table->primary(['rm_cat_type']);
            $table->index(['rm_cat_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_rm_cat_type');
    }
};
