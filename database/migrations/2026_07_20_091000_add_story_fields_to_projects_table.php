<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('problem')->nullable()->after('long_description');
            $table->text('solution')->nullable()->after('problem');
            $table->text('my_contribution')->nullable()->after('solution');
            $table->json('screenshots')->nullable()->after('my_contribution');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['problem', 'solution', 'my_contribution', 'screenshots']);
        });
    }
};
