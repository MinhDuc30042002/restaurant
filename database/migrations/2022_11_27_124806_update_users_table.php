<?php

use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_manager')->default(false);
            $table->boolean('is_staff')->default(false);
            $table->foreignId('partner_id')->nullable()->constrained('partners')->cascadeOnUpdate()->cascadeOnDelete();
        });
        Permission::crud('users');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['partner_id']);
        });
    }
};
