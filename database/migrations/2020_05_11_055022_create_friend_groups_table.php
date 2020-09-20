<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFriendshipsGroupsTable
 */
class CreateFriendGroupsTable extends Migration
{

    public function up() {

        Schema::create('friend_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('friend_id')->unsigned();
            $table->bigInteger('group_id')->unsigned();

            $table->foreign('friend_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade');
        });

    }

    public function down() {
        Schema::dropIfExists('friend_groups');
    }

}
