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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->index();
            $table->char('iso3', 3)->nullable();
            $table->char('numeric_code', 3)->nullable()->index();
            $table->char('iso2', 2)->nullable();
            $table->string('phonecode')->nullable()->index();
            $table->string('capital')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_name')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('tld')->nullable();
            $table->string('native')->nullable();
            $table->unsignedBigInteger('population')->nullable();
            $table->unsignedBigInteger('gdp')->nullable();
            $table->string('region')->nullable();
            $table->unsignedMediumInteger('region_id')->nullable();
            $table->string('subregion')->nullable();
            $table->unsignedMediumInteger('subregion_id')->nullable();
            $table->string('nationality')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->boolean('flag')->default(true);
            $table->string('wikiDataId')->nullable()->comment('Rapid API GeoDB Cities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
