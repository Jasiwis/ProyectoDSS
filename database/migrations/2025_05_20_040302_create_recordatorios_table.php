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
    Schema::create('recordatorios', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('nota_id');
        $table->dateTime('fecha_recordatorio');
        $table->boolean('notificado')->default(false);
        $table->timestamps();

        $table->foreign('nota_id')->references('id')->on('notas')->onDelete('cascade');
    });
}

};
