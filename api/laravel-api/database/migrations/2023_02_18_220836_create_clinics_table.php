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
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('delete_flag')->default(0);
            $table->timestamp('created_at');
            $table->integer('created_user_id')->default(0);
            $table->string('created_action', '100')->collation('utf8mb4_bin');
            $table
                ->timestamp('updated_at')
                ->nullable()
                ->default(null);
            $table
                ->integer('upd_user_id')
                ->nullable()
                ->default(null);
            $table
                ->string('upd_action', '100')
                ->collation('utf8mb4_bin')
                ->nullable()
                ->default(null);
            $table
                ->timestamp('deleted_at')
                ->nullable()
                ->default(null);
            $table
                ->integer('del_user_id')
                ->nullable()
                ->default(null);
            $table
                ->string('del_action', '100')
                ->collation('utf8mb4_bin')
                ->nullable()
                ->default(null);
            $table->integer('category_type'); //どのクリニックか
            $table->tinyInteger('use_flag')->default(0);
            $table
                ->string('clinic_name', '100')
                ->collation('utf8mb4_bin')
                ->nullable()
                ->default(null);
            $table
                ->string('clinic_address', '100')
                ->collation('utf8mb4_bin')
                ->nullable()
                ->default(null);
            $table->double('latitude', 9, 6);
            $table->double('longitude', 9, 6); //
            $table->integer('prefecture_cd')->default(0);
            $table->integer('sort_no')->default(999);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinics');
    }
};
