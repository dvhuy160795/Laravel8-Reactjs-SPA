<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'attachments', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255);
                $table->string('extension', 255);
                $table->string('size', 255);
                $table->string('mine_type', 255);
                $table->string('path', 255);
                $table->string('store_type', 20)->comment('storage|aws-s3');
                $table->string('visibility_type', 20)->comment('public|private');
                $table->string('object_type', 50)->comment('{object-name}_{object-property}');
                $table->integer('object_id');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
