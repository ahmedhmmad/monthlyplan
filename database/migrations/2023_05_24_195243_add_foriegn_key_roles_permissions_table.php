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
        Schema::table('permission_role', function (Blueprint $table) {
            if (!Schema::hasColumn('permission_role', 'role_id')) {
                $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            }

            if (!Schema::hasColumn('permission_role', 'permission_id')) {
                $table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade');
            }

            $table->index(['role_id', 'permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['permission_id']);
            $table->dropIndex(['role_id', 'permission_id']);

            // Only drop the columns if they exist
            if (Schema::hasColumn('permission_role', 'role_id')) {
                $table->dropColumn('role_id');
            }

            if (Schema::hasColumn('permission_role', 'permission_id')) {
                $table->dropColumn('permission_id');
            }
        });
    }
};
