<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade'); 
            $table->decimal('tuition_fee', 8, 2);
            $table->decimal('activity_fee', 8, 2);
            $table->decimal('total_fee', 8, 2);
            $table->timestamps();
        });
    }
    //...
};