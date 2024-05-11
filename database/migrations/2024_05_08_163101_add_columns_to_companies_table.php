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
        Schema::table('companies', function (Blueprint $table) {
            $table->string('companyname')->nullable(); // Thêm cột companyname có thể null
            $table->string('website')->nullable(); // Thêm cột website có thể null
            $table->string('phone')->nullable(); // Thêm cột phone có thể null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('companyname'); // Xóa cột companyname
            $table->dropColumn('website'); // Xóa cột website
            $table->dropColumn('phone'); // Xóa cột phone
        });
    }
};
