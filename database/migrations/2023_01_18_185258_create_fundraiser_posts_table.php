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
        Schema::create( 'fundraiser_posts', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'fundraiser_category_id' )->constrained();
            $table->string( 'title' );
            $table->decimal( 'goal' );
            $table->date( 'end_date' );
            $table->longText( 'story' )->nullable();
            $table->string( 'image' )->nullable();
            $table->boolean( 'agree' );
            $table->boolean( 'status' )->default( true );
            $table->softDeletes();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'fundraiser_posts' );
    }
};