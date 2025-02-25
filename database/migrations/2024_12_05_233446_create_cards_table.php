<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateCardsTable extends Migration
{
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Usuário dono do cartão
            $table->string('cardNumber')->unique();
            $table->integer('cvv');
            $table->string('cardHolder');
            $table->integer('expirationMonth');
            $table->integer('expirationYear');
            $table->string('type')->default('virtual'); // Tipo de cartão
            $table->string('status')->default('ativo'); // Status do cartão
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cards');
    }
}


