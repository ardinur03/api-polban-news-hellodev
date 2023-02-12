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
        Schema::create('student_center_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('new_id')->constrained('news');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('campus_organization_code');
            $table->foreign('campus_organization_code')->references('code')->on('campus_organizations');
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
        Schema::dropIfExists('student_center_news');
    }
};
