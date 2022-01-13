<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prenoms');
            $table->string('mail')->unique();
            $table->string('password');
            $table->string('api_token', 80)
            ->unique()
            ->nullable()
            ->default(null);
            $table->string('telephone');
            $table->date('date_naissance')->nullable();
            $table->enum('type', ['client', 'commercial_terrain', 'commercial_sedentaire', 'commercial_grand_compte', 'responsable_technique', 'technicien', 'prestataire', 'commercial_influenceur', 'administrateur'])->default('client');
            $table->string('nom_entreprise')->nullable();
            $table->string('registre_commerce')->nullable();
            $table->string('dfe')->nullable();
            $table->string('pc_code', 100)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('utilisateurs');
    }
}
