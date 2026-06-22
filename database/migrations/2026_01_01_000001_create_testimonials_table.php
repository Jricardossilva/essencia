<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('testimonials', function (Blueprint $t) {
            $t->id();
            $t->string('autor');
            $t->unsignedTinyInteger('estrelas')->default(5);
            $t->text('texto');
            $t->boolean('publicado')->default(true);
            $t->unsignedInteger('ordem')->default(0);
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('testimonials'); }
};
