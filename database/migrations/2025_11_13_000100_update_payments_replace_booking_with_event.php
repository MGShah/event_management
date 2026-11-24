<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Add new event_id column (nullable to allow transition)
            $table->foreignId('event_id')->nullable()->constrained()->nullOnDelete();
        });

        // If you need to migrate old data from booking_id -> event_id, do it here
        // using DB::statement with a join, if bookings table still exists.
        // Example (MySQL):
        // DB::statement('UPDATE payments p JOIN bookings b ON p.booking_id = b.id SET p.event_id = b.event_id');

        Schema::table('payments', function (Blueprint $table) {
            // Drop old foreign key and column if present
            if (Schema::hasColumn('payments', 'booking_id')) {
                // Attempt to drop FK safely if it exists (name may vary by driver)
                try { $table->dropConstrainedForeignId('booking_id'); } catch (\Throwable $e) { /* ignore */ }
                try { $table->dropForeign(['booking_id']); } catch (\Throwable $e) { /* ignore */ }
                $table->dropColumn('booking_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Recreate booking_id
            $table->foreignId('booking_id')->nullable()->constrained()->nullOnDelete();
        });

        // Optionally backfill booking_id from event_id here if needed

        Schema::table('payments', function (Blueprint $table) {
            // Drop event_id
            if (Schema::hasColumn('payments', 'event_id')) {
                try { $table->dropConstrainedForeignId('event_id'); } catch (\Throwable $e) { /* ignore */ }
                try { $table->dropForeign(['event_id']); } catch (\Throwable $e) { /* ignore */ }
                $table->dropColumn('event_id');
            }
        });
    }
};
