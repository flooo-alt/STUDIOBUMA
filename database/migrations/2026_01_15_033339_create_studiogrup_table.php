<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('studio_grup', function (Blueprint $table) {
    $table->id();
    $table->string('booking_code')->unique();
    $table->string('no_whatsapp');
    $table->string('name');
    $table->enum('category', ['grup', 'family']);
    $table->enum('package', [
        'Leaf','Breeze','Dawn',
        'Excited','Delighted','Enthusiastic'
    ]);
    $table->integer('person');
    $table->time('jam');
    $table->date('tanggal');
    $table->enum('status',['Booked','Shooting','Editing','Done'])->default('Booked');
    $table->string('image_result')->nullable();
    $table->timestamps();
});

}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studio_grup');
    }
};
