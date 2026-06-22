<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('leads', function (Blueprint $t) {
            $t->id();
            $t->enum('calculadora', ['queda','ciclo']);
            $t->string('nome');
            $t->string('email');
            $t->string('telefone')->nullable();
            $t->unsignedSmallInteger('pontuacao')->nullable();
            $t->string('classificacao')->nullable();
            $t->json('payload')->nullable();
            $t->timestamps();
            $t->unique(['calculadora','email'], 'uk_lead_email'); // TRAVA: 1 por e-mail
        });
    }
    public function down(): void { Schema::dropIfExists('leads'); }
};
