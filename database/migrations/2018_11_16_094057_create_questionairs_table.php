<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionairs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128)->default('');

            $table->integer('duration')->unsigned();
            $table->tinyInteger('duration_type')->index()->default('0');

            $table->tinyInteger('resume_or_not')->index()->default('0');
            $table->tinyInteger('published_or_not')->index()->default('0');

            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
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
        Schema::dropIfExists('questionairs');
    }
}
