<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chamadas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_turma')->constrained('turmas')->onDelete('cascade');
            $table->foreignId('id_aluno')->constrained('alunos')->onDelete('cascade');
            $table->boolean('presenca')->nullable();
            $table->date('data');
            $table->timestamps();
        });
    }    
    
    public function down()
    {
        Schema::dropIfExists('chamadas');
    }
    
};
