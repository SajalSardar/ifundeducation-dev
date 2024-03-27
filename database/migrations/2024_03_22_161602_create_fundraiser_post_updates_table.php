<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('fundraiser_post_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onUpdate('cascade');
            $table->foreignId('fundraiser_post_id')->constrained()->onUpdate('cascade')->onUpdate('cascade');
            $table->string('title')->nullable();
            $table->json('categories')->nullable();
            $table->string('slug')->nullable();
            $table->text('shot_description')->nullable();
            $table->decimal('goal')->nullable();
            $table->date('end_date')->nullable();
            $table->longText('story')->nullable();
            $table->string('image')->nullable();
            $table->boolean('agree')->nullable();
            $table->string('status')->default("pending")->comment('initiated,pending, updated, cancelled');
            $table->integer('accepted_by')->nullable();
            $table->integer('cancel_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('fundraiser_post_updates');
    }
};
