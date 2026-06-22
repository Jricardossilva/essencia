<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::table('posts', function (Blueprint $t) {
            if (!Schema::hasColumn('posts','imagem_principal')) $t->string('imagem_principal')->nullable()->after('capa');
            if (!Schema::hasColumn('posts','imagem_secundaria')) $t->string('imagem_secundaria')->nullable()->after('imagem_principal');
        });
    }
    public function down(): void {
        Schema::table('posts', function (Blueprint $t) {
            $t->dropColumn(['imagem_principal','imagem_secundaria']);
        });
    }
};
