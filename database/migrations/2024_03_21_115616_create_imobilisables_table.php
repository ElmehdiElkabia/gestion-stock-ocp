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
        Schema::create('imobilisables', function (Blueprint $table) {
            $table->id();
            $table->string('code_matricule')->unique();
            $table->string('description');
            $table->string('affectation_SA');
            $table->date('date_reception');
            $table->date('date_fin_garantie')->nullable();
            $table->string('image')->nullable();
            $table->string('numero_commande')->nullable();
            $table->string('fournisseur')->nullable();
            $table->string('numero_bille')->unique();
            $table->integer('quantite');
            $table->string('suivre_sucrete')->nullable();
            $table->string('DMS_PVES')->nullable();
            $table->string('cout')->nullable();
            $table->string('category')->nullable();
            $table->string('emplacement')->unique();
            $table->string('pdf_file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imobilisables');
    }
};
