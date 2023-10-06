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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('deadline');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedSmallInteger('status')->default(1);
            $table->timestamps();

            $table->index('project_id', 'task_project_idx');
            $table->foreign('project_id', 'task_project_fk')->on('projects')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
