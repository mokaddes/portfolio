<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tables = ['skills', 'tools', 'personal_qualities', 'educations'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->boolean('status')->default(1)->after('id');
            });
        }
    }

    public function down(): void
    {
        $tables = ['skills', 'tools', 'personal_qualities', 'educations'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
};
