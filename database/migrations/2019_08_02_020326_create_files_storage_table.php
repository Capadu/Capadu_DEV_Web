<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesStorageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files_storage', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('total_space')->nullable()->default(0);
            $table->unsignedInteger('available_space')->nullable()->default(0);
            $table->unsignedInteger('used_space')->nullable()->default(0);

            $table->unsignedInteger('user_id');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('no action');

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
        Schema::dropIfExists('files_storage');
    }
}
