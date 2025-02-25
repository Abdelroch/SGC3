<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitacaosTable extends Migration
{
    public function up()
    {
        Schema::create('solicitacaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->string('nif')->unique();
            $table->string('pay');
            $table->string('valor');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitacaos');
    }
}
