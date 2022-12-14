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
        Schema::create('upload_p_d_f_s', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('paperId');
            $table->string('edition');
            $table->string('publishOn');
            $table->string('fileUrl');
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
        Schema::dropIfExists('upload_p_d_f_s');
    }
};
