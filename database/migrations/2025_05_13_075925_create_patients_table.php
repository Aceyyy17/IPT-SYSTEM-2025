<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Patient;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('age');
            $table->string('address');
            $table->string('phone_number');
            $table->string('gender');
            $table->foreignId('diagnose_id')->constrained('diagnoses')->onDelete('cascade');
            $table->foreignId('specialist_id')->constrained('specialists')->onDelete('cascade');

            $table->timestamps();
        });

        $patients = [
        [
            'first_name' => 'Ace',
            'last_name' => 'Bacus', 
            'age' => '23',
            'address' => 'Minglanilla, Cebu City',
            'phone_number' => '09123456789',
            'gender' => 'Male',
            'diagnose_id' => 1,
            'specialist_id' => 1,

        
        ],
            
        ];

        foreach ($patients as $patient) {
            Patient::create($patient);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
