<?php

use Waygou\Laraning\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boilerplate', function (Blueprint $table) {
            /* Columns */
            $table->increments('id');
            $table->string('name');

            /* System columns */
            $table->timestamps();
            $table->softDeletes();

            /* Engine */
            $table->engine = 'InnoDB';

            /* Collation */
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });

        /*** Data initialization **/
        User::create(['name' => 'Bruno Falcão',
                      'email' => 'bruno.falcao@live.com',
                      'password' => bcrypt('honda'), ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
