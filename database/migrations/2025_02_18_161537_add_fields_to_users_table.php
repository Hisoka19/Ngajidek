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
        if (!Schema::hasColumn('users', 'city')) {
            $table->string('city')->nullable();
        }
        if (!Schema::hasColumn('users', 'age')) {
            $table->integer('age')->nullable();
        }
        if (!Schema::hasColumn('users', 'whatsapp')) {
            $table->string('whatsapp')->nullable();
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('city');      // Drop city column
            $table->dropColumn('age');       // Drop age column
            $table->dropColumn('whatsapp');  // Drop whatsapp column
        });
    }
};
