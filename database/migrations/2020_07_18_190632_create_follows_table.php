<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedInteger('following_id')->comment('フォローしているユーザーid');
            $table->unsignedInteger('followed_id')->comment('フォローされているユーザーID');

            // インデックス
            $table->index('following_id');
            $table->index('followed_id');

            // ユニーク
            $table->unique([
                'following_id',
                'followed_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
