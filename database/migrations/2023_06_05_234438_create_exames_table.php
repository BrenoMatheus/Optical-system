<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exames', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("doutor"); //doctor name
            $table->string("image_exame"); // examination image       
            $table->string("diagnostico"); // diagnosed diseases
            $table->string("indicacao"); //recommendation of glasses for use
            $table->text("observacao"); //doctor's observations
            $table->dateTime('data'); // date of examination
            $table->foreignId('user_id')->constrained(); //foreign key of the user who created the examination
            $table->foreignId('pacient_id')->constrained(); //foreign key of the patient to whom the examination refers
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exames', function(Blueprint $table){
            $table->foreingId('user_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreingId('pacient_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
};