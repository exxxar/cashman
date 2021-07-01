<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('domain')->unique();
            $table->integer('cashback_percent_level_1');
            $table->integer('cashback_percent_level_2');
            $table->integer('cashback_percent');
            $table->text('description');
            $table->string('image');
            $table->string('position');
            $table->bigInteger('company_group_id')->unsigned();
            $table->foreign('company_group_id')
                ->references('id')->on('group_companies');
            $table->json('properties');
            $table->string('callback_url');
            $table->json('socials');
            $table->boolean('is_active');
            $table->string('upload_vk_url');
            $table->bigInteger('creator_id')->unsigned();
            $table->foreign('creator_id')
                ->references('id')->on('users');
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
        Schema::dropIfExists('companies');
    }
}
