<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('route')->nullable();
            $table->string('external_url')->nullable();
            $table->string('no')->nullable();
            $table->boolean('is_published')->nullable();
            $table->foreignId('menu_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('primary_menus');
    }
};
