<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newspaper_pages', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('date');
            $table->string('paperId');
            $table->string('edition');
            $table->string('pageTitle');
            $table->string('publishOn');
            $table->string('pageNo');
            $table->string('pageImageUrl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newspaper_pages');
    }
};
