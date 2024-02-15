<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->unsignedBigInteger('budget');
        $table->date('start_date');
        $table->date('end_date');
        $table->text('requirements');
        $table->integer('status');
        $table->text('description');
        $table->string('cover_image')->nullable();
        $table->timestamps();
        $table->softDeletes(); 
    });

    
    Schema::create('project_artist', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('project_id');
        $table->unsignedBigInteger('artist_id');
        $table->timestamps();

        $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        $table->foreign('artist_id')->references('id')->on('users')->onDelete('cascade');
    });

    
    Schema::create('project_partner', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('project_id');
        $table->unsignedBigInteger('partner_id');
        $table->timestamps();

        $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }

};
