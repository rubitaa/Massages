<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
     public function up()
    {
        Schema::create('messages', function (Blueprint $table) {

            $table->bigIncrements('message_id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('title');
            $table->text('content');
            $table->timestamps();
            $table->softDeletes();

        });
    }


   public function down()
    {
        Schema::dropIfExists('messages',function (Blueprint $table){
        $table->dropColumn('deleted_at');
        });
    }
}
