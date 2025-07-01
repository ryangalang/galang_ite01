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
        Schema::table('users', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('password');
            $table->string('contact_number')->nullable()->after('password');
            $table->boolean('is_otp_enabled')->nullable()->after('contact_number');
            $table->bigInteger('otp_number')->nullable()->after('is_otp_enabled');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('photo');
            $table->dropColumn('contact_number');
            $table->dropColumn('is_otp_enabled');
            $table->dropColumn('otp_number');
        });
    }
};

