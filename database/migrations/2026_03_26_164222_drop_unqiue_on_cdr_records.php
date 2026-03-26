<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cdr_records', function (Blueprint $table) {
            // This creates a composite unique key
            $table->unique(['caller_number', 'end_time'], 'unique_call_record');
        });
    }

    public function down(): void
    {
        Schema::table('cdr_records', function (Blueprint $table) {
            $table->dropUnique('unique_call_record');
        });
    }
};
