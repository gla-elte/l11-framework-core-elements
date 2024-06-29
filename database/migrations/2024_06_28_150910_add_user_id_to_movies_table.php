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
    Schema::table('movies', function (Blueprint $table) {
      $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('movies', function (Blueprint $table) {
      if (env('DB_CONNECTION') !== 'sqlite')
        $table->dropForeign(['user_id']);

      $table->dropColumn('user_id');
    });
  }
};
