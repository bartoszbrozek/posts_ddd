<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpvoteDownvote extends Migration
{
    public function up()
    {
        Schema::create('post_votes', function (Blueprint $table) {
            $table->uuid('user_uuid')->index();
            $table->uuid('post_uuid')->index();
            $table->enum('type', ['upvote', 'downvote'])->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_votes');
    }
}
