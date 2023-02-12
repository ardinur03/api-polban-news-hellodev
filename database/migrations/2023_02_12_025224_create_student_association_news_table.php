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
        Schema::create('student_association_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('new_id')->constrained('news');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('faculty_organizations_code');
            $table->foreign('faculty_organizations_code')->references('code')->on('faculty_organizations');
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
        Schema::dropIfExists('student_association_news');
    }
};
