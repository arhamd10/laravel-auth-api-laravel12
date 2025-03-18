<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('student_id'); // Custom ID name
            $table->string('image')->nullable();
            $table->string('email_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->date('date_of_birth');
            $table->string('standard');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->year('entry_year');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};