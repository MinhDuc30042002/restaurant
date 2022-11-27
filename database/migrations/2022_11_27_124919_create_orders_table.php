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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->float('amount')->nullable();
            $table->timestamps();
            //
            $table->foreignId('partner_id')->nullable()->constrained('partners')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('type_id')->constrained('order_types')->cascadeOnUpdate()->cascadeOnDelete();
        });
        Permission::crud('orders');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
