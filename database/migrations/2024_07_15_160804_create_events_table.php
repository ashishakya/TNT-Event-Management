<?php

use App\Constants\DbTables;
use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(DbTables::EVENTS, function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->date("date");
            $table->date("destination");
            $table->longText("description");
            $table->longText("status")->default(Event::DRAFT_STATUS);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(DbTables::EVENTS);
    }
};
