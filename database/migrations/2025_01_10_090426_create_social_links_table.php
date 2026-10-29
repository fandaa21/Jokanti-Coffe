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
        if (Schema::hasTable('social_links')) {
            return;
        }

        Schema::create('social_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('platform');
            $table->string('link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This table may predate Laravel migrations and contain existing data.
    }
};
