<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// database/migrations/xxxx_xx_xx_create_answer_choices_table.php
return new class extends Migration {
    public function up(): void {
        Schema::create('answer_choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->cascadeOnDelete();
            $table->string('choice_text');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('answer_choices');
    }
};
