<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaults', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('forum')->unsigned();
            $table->enum('type', ['user', 'family', 'business']);
            $table->string('name', 128)->nullable($value = true)->unique();
            $table->string('slug', 128)->nullable($value = true)->unique();
            $table->timestamps();
            $table->unique(['forum', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaults');
    }
}
