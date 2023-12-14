<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('licors', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->integer('precio');
            $table->text('descripcion');
            $table->unsignedBigInteger('categoria_id')-> nullable()->usingned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->string('imagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licors');
    }
};
