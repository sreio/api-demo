<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',12)->comment('用户名称');
            $table->string('password', 80)->comment('密码');
            $table->text('last_token')->nullable()->comment('登陆时的token');
            $table->tinyInteger('status')->default(0)->comment('用户状态 -1代表已删除 0代表正常 1代表冻结');
            $table->timestamp('created_at', 0)->nullable()->comment('创建时间');
            $table->timestamp('updated_at', 0)->nullable()->comment('修改时间');
            //$table->timestamps();
            $table->unique(['name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
