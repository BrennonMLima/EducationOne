<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aluno');
            $table->unsignedBigInteger('id_turma');
            $table->date('data_matricula');
            $table->timestamps();

            $table->foreign('id_aluno')->references('id')->on('alunos')->onDelete('cascade');
            $table->foreign('id_turma')->references('id')->on('turmas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
