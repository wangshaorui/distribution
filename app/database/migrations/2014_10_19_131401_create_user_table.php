<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('email', 64);
            $table->string('name', 16);
            $table->string('password', 64);

            $table->string('nickname', 16)->default('');
            $table->string('avatar', 256)->default('');
            $table->string('descr', 512)->default('');
            $table->string('website', 256)->default('');
            $table->string('sex', 16)->default('unknown');
            // $table->dateTime('registered_at'); // use created_at

            $table->boolean('is_confirmed')->default(false);
            $table->string('status', 16)->default('member');

            // $table->dateTime('last_login_at');

            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }

}
