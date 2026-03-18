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
        //
        Schema::dropIfExists("CDRRecord");


        Schema::create("cdr_records", function (Blueprint $table) {

            $table->id();
            $table->string("caller_number")->nullable();
            $table->string("caller_id")->nullable();
            $table->string("call_status")->nullable();
            $table->datetime("start_time")->nullable();
            $table->datetime("end_time")->nullable();
            $table->nullableTimestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
