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
        Schema::create('faculty_organizations', function (Blueprint $table) {
            $table->string('code_faculty_organization', 10)->primary('faculty_organizations_pkey');
            $table->foreignId('faculty_id')->constrained('faculties');
            $table->string('name_faculty_organization', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty_organizations');
    }
};
