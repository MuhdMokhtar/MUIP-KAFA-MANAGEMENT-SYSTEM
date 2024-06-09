<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            // Relationship to Parent (User)
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('users'); 

            // Other student-related fields
            $table->date('date_of_birth')->nullable();
            $table->string('darjah')->nullable();
            
          

            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};