<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreignId('service_id')
            ->constrained()
            ->onDelete('cascade');
            $table->integer('prix')->unsigned();
            $table->integer('quantite')->unsigned()->default(1);
            $table->enum('status', ['non-verifie', 'appel', 'verifie', 'en-cours-visite', 'fin-visite', 'valide', 'annule', 'execution', 'termine'])->default('non-verifie');
            $table->bigInteger('technicien_id')->nullable();
            $table->bigInteger('commercial_id')->nullable();
            $table->bigInteger('responsable_technique_id')->nullable();
            $table->bigInteger('prestataire_id')->nullable();
            $table->string('materiel')->nullable();
            $table->string('order_id')->nullable();
            $table->string('description')->nullable();
            $table->string('lieu')->nullable();
            $table->date('date_execution')->nullable();
            $table->integer('note')->unsigned()->nullable();
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
        Schema::dropIfExists('commandes');
    }
}
