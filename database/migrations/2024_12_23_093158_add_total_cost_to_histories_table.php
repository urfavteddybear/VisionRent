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
        Schema::table('histories', function (Blueprint $table) {
            $table->decimal('total_cost', 10, 2)->default(0); // Add a column for total cost
        });
    }

    public function down()
    {
        Schema::table('histories', function (Blueprint $table) {
            $table->dropColumn('total_cost');
        });
    }
};
