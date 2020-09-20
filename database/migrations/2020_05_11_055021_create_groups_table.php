<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{

    public function up() {

        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->string('slug', 191)->nullable();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
        });

    }

    public function down() {
        Schema::dropIfExists('groups');
    }

}
