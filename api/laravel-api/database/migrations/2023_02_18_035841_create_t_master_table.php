<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_master', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('del_flg')->default(0);
            $table->timestamps('ins_timestamp')->nullable(false);
            $table->timestamps('ins_action')->nullable(false);
            $table->timestamps('upd_timestamp');
            $table->timestamps('upd_user_id');
            $table->string('upd_action', '100');
            $table->timestamps('del_timestamp');
            $table->timestamps('del_user_id');
            $table->string('del_action', '100');
            $table->timestamps('category_type')->nullable(false);
            $table->timestamps('category_key')->nullable(false);
            $table->timestamps('category_value');
            $table->timestamps('d');
            $table
                ->integer('sort_no')
                ->nullable(false)
                ->default(999);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_master');
    }
};
