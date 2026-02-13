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
            $table->year('document_year')->nullable()->after('url');
            $table->date('document_date')->nullable()->after('document_year');
            $table->index('document_year');
            $table->index('document_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropIndex(['document_year']);
            $table->dropIndex(['document_date']);
            $table->dropColumn(['document_year', 'document_date']);
        });
    }
};
