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
        $table->foreignId('county_id')->nullable()->constrained()->onDelete('set null');
        $table->dropColumn('county');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
