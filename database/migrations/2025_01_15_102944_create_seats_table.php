<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_seats_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coach_id')->constrained()->onDelete('cascade'); // Foreign key to coaches
            $table->string('seat_number');  // Seat number
            $table->boolean('is_available')->default(true);  // Seat availability (true = available, false = booked)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seats');
    }
}

