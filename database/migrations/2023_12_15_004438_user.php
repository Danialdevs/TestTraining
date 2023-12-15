<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('Users', function (Blueprint $table) {
            $table->integer('school_id');
            $table->integer('role');
        });
    }

    public function down()
    {
        Schema::table('Users', function (Blueprint $table) {
            //
        });
    }
};
