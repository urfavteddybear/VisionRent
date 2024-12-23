<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->decimal('penalty_percent', 5, 2)->default(0)->after('price');
        });

        Schema::table('histories', function (Blueprint $table) {
            $table->decimal('penalty_total', 10, 2)->nullable()->after('status');
            $table->date('return_date')->nullable()->after('end_date');
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('penalty_percent');
        });

        Schema::table('histories', function (Blueprint $table) {
            $table->dropColumn(['penalty_total', 'return_date']);
        });
    }

};
