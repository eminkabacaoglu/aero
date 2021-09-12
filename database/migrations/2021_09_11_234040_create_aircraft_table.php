<?php

use App\Models\ManufacturerModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAircraftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aircraft', function (Blueprint $table) {
            $table->id();
            $table->string('tail_number');
            $table->foreignIdFor(ManufacturerModel::class);
            $table->year('year');
            $table->Integer('flight_hours');
            $table->timestamps();

            $table->unique(['tail_number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aircraft');
    }
}
