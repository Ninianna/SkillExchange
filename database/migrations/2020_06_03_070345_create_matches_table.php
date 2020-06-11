<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->string('user_name');
            $table->string('able_to_exchange');
            $table->string('want_to_exchange');
            $table->string('self_introduction');
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
            $table->Integer('match_user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
