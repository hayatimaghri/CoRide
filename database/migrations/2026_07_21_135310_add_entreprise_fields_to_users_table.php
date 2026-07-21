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
        Schema::table('users', function (Blueprint $table) {

            $table->foreignId('entreprise_id')
                  ->constrained('entreprises')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->string('ville_residence');

            $table->enum('role', [
                'conducteur',
                'passager',
                'les_deux'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['entreprise_id']);
            $table->dropColumn([
                'entreprise_id',
                'ville_residence',
                'role'
            ]);
        });
    }
};