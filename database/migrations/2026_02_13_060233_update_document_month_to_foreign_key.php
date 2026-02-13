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
        Schema::table('documents', function (Blueprint $table) {
            // Add new foreign key column
            $table->foreignId('document_month_id')->nullable()->after('document_year')->constrained('months')->onDelete('set null');
            
            // Drop old month column
            $table->dropColumn('document_month');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            // Add back old month column
            $table->tinyInteger('document_month')->nullable()->after('document_year');
            
            // Drop foreign key constraint and column
            $table->dropForeign(['document_month_id']);
            $table->dropColumn('document_month_id');
        });
    }
};
