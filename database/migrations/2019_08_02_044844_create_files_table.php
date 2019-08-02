<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name');
            $table->string('storrage_key')->unique();
            $table->string('route')->unique();
            $table->unsignedInteger('file_size');

            $table->unsignedInteger('files_storage_id');

            $table->foreign('files_storage_id')
                ->references('id')->on('files_storage')
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
        Schema::dropIfExists('files');
    }
}
