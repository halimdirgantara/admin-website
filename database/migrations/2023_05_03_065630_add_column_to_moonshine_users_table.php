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
        Schema::table('moonshine_users', function (Blueprint $table) {
            $table->boolean('is_online')->default(false)->after('remember_token');
            $table->foreignId('organization_id')->nullable()->after('is_online');
            $table->foreign('organization_id')->references('id')->on('organizations')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('moonshine_users', function (Blueprint $table) {
            //
        });
    }
};
