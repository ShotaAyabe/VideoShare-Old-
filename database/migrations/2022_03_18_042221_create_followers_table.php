<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->unsignedInteger('following_id')->comment('フォローしているユーザID');
            $table->unsignedInteger('followed_id')->comment('フォローされているユーザID');

            $table->index('following_id');
            $table->index('followed_id');
            
    /**uniqueを登録する事で以下のキーの組み合わせで
    同じIDの登録を防ぐ*/
            $table->unique([
                'following_id',
                'followed_id'
            ]);
        });
    }
    
//Comments

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followers');
    }
}
