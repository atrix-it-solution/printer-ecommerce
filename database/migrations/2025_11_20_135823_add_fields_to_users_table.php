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
        Schema::table('users', function (Blueprint $table) {
            // Check and add only missing columns
            if (!Schema::hasColumn('users', 'display_name')) {
                $table->string('display_name')->after('name')->nullable();
            }
            
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->after('email')->nullable();
            }
            
            
            if (!Schema::hasColumn('users', 'date_of_birth')) {
                $table->date('date_of_birth')->nullable()->after('role');
            }
            
            if (!Schema::hasColumn('users', 'gender')) {
                $table->enum('gender', ['Male', 'Female', 'Other'])->nullable()->after('date_of_birth');
            }
            
            if (!Schema::hasColumn('users', 'newsletter_subscription')) {
                $table->boolean('newsletter_subscription')->default(false)->after('gender');
            }
            
            if (!Schema::hasColumn('users', 'receive_order_updates')) {
                $table->boolean('receive_order_updates')->default(false)->after('newsletter_subscription');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'display_name', 
                'phone', 
                'date_of_birth', 
                'gender', 
                'newsletter_subscription',
                'receive_order_updates'
            ]);
        });
    }
};
