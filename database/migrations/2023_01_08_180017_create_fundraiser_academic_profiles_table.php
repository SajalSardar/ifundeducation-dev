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
        Schema::create( 'fundraiser_academic_profiles', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'user_id' )->constrained()->onUpdate( 'cascade' )->onDelete( 'cascade' );
            $table->string( 'college_or_university' )->nullable();
            $table->string( 'study' )->nullable();
            $table->string( 'enrolled_degree' )->nullable();
            $table->string( 'classification' )->nullable();
            $table->string( 'current_gpa' )->nullable();
            $table->boolean( 'show_gpa' )->nullable();
            $table->text( 'experience' )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'fundraiser_academic_profiles' );
    }
};