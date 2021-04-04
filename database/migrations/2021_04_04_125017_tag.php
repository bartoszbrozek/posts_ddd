<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tag extends Migration
{
    public function up()
    {
        Schema::create('tag', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('value', 64)->unique();
        });

        Schema::create('post_tag', function (Blueprint $table) {
            $table->foreignUuid('post_id')->index();
            $table->foreignUuid('tag_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('tag');
    }
}
