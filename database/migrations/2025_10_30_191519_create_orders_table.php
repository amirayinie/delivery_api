<?php

use App\Enums\OrderStatus;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete();
            $table->foreignId('assigned_courier_id')->nullable()->constrained('couriers');
            $table->decimal('pickup_lat',10,7);
            $table->decimal('pickup_lng',10,7);
            $table->string('pickup_address');
            $table->string('sender_name');
            $table->string('sender_mobile',11);
            $table->decimal('destination_lat',10,7);
            $table->decimal('destination_lng',10,7);
            $table->string('destination_address');
            $table->string('receiver_name');
            $table->string('reciever_mobile',11);
            $table->enum('status',array_column(OrderStatus::cases(),'value'))->default(OrderStatus::REQUESTED->value);
            $table->timestamp('requested_at');
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('picked_up_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamps();

            $table->index(['organization_id', 'status']);
            $table->index(['assigned_courier_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
