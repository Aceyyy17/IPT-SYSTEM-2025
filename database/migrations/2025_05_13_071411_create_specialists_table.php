<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Specialist;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('specialists', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('specialization');
            $table->timestamps();
        });

        $specialists = [
            ['first_name' => 'John', 'last_name' => 'Doe', 'specialization' => 'Cardiology'],
            ['first_name' => 'Jane', 'last_name' => 'Smith', 'specialization' => 'Neurology'],
            ['first_name' => 'Emily', 'last_name' => 'Johnson', 'specialization' => 'Pediatrics'],
        ];

        foreach ($specialists as $specialist) {
            Specialist::create($specialist);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialists');
    }
};
