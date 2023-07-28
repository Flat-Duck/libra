<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('publisher');
            $table->timestamp('published_at');
            $table->unsignedBigInteger('department_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papers');
    }
};
