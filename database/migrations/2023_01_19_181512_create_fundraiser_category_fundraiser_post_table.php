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
        Schema::create( 'fundraiser_category_fundraiser_post', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'fundraiser_category_id' )->constrained( 'fundraiser_categories' )->index( 'fc_id' );
            $table->foreignId( 'fundraiser_post_id' )->constrained( 'fundraiser_posts' )->index( 'fp_id' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'fundraiser_category_fundraiser_post' );
    }
};