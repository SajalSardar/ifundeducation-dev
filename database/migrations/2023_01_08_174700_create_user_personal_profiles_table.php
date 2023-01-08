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
        Schema::create( 'user_personal_profiles', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'user_id' )->constrained()->onUpdate( 'cascade' )->onDelete( 'cascade' );
            $table->string( 'phone' )->nullable();
            $table->string( 'birthday' )->nullable();
            $table->string( 'address' )->nullable();
            $table->string( 'city' )->nullable();
            $table->string( 'state' )->nullable();
            $table->string( 'zip_code' )->nullable();
            $table->string( 'country' )->nullable();
            $table->string( 'gender' )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'user_personal_profiles' );
    }
};