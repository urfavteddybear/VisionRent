<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('full_name')->nullable()->after('role');
            $table->string('nik')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('ktp_path')->nullable();
            $table->enum('verification_status', ['unverified', 'pending', 'verified', 'rejected'])->default('unverified');
            $table->text('rejection_reason')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'full_name',
                'nik',
                'phone',
                'address',
                'ktp_path',
                'verification_status',
                'rejection_reason'
            ]);
        });
    }
};
