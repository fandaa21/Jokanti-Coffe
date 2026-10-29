<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('about')) {
            Schema::create('about', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->text('isi');
                $table->string('gambar')->nullable();
                $table->string('logo')->nullable();
                $table->string('whatsapp')->nullable();
                $table->string('instagram')->nullable();
                $table->string('tokopedia')->nullable();
                $table->string('grabfood')->nullable();
                $table->string('gofood')->nullable();
            });
        } else {
            $missingAboutColumns = array_diff(
                ['logo', 'whatsapp', 'instagram', 'tokopedia', 'grabfood', 'gofood'],
                Schema::getColumnListing('about')
            );

            if ($missingAboutColumns !== []) {
                Schema::table('about', function (Blueprint $table) use ($missingAboutColumns) {
                    foreach ($missingAboutColumns as $column) {
                        $table->string($column)->nullable();
                    }
                });
            }
        }

        if (! Schema::hasTable('product')) {
            Schema::create('product', function (Blueprint $table) {
                $table->increments('id');
                $table->string('judul');
                $table->text('deskripsi');
                $table->integer('harga');
                $table->text('gambar')->nullable();
            });
        }

        if (! Schema::hasTable('ulasan')) {
            Schema::create('ulasan', function (Blueprint $table) {
                $table->id();
                $table->integer('rating');
                $table->text('isi');
                $table->string('nama');
                $table->string('gambar')->nullable();
            });
        }
    }

    public function down(): void
    {
        // These tables may predate Laravel migrations and contain existing data.
    }
};
