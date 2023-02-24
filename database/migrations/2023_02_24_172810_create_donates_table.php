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
        Schema::create( 'donates', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'charge_id' );
            $table->string( 'balance_transaction_id' );
            $table->decimal( 'amount' );
            $table->decimal( 'stripe_fee' );
            $table->decimal( 'net_balance' );
            $table->string( 'status' )->default( 'Succeeded' );
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
        Schema::dropIfExists( 'donates' );
    }
};