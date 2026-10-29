<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('guest');
            });

            return;
        }

        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('guest')->change();
        });
    }

    public function down(): void
    {
        // The role column may predate this migration and is required by the app.
    }
};
