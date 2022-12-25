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
        Schema::create('order_lines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //
            $table->foreignId('food_id')->nullable()->constrained('foods')->cascadeOnUpdate()->nullOnDelete();
            $table->string('food_name')->nullable();
            $table->string('food_image')->nullable();
            $table->float('food_price')->nullable();
            $table->integer('quantity')->default(1);
            $table->float('amount', 12)->nullable();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnUpdate()->cascadeOnDelete();
        });
        Permission::crud('order_lines');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_lines');
    }
};
