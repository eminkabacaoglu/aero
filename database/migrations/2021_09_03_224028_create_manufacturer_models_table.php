<?php

use App\Models\Manufacturer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturerModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturer_models', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Manufacturer::class);
            $table->string('model_name');
            $table->timestamps();

            $table->unique(['manufacturer_id', 'model_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manufacturer__models');
    }
}
