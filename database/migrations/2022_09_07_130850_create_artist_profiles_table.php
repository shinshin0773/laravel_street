<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name');
            $table->text('information')->nullable();
            $table->string('sns_account')->nullable();
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('artist_profiles');
    }
}
