<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userName')->unique();
            $table->string('email')->unique();
            $table->string('typeUser');
            $table->string('contact');
            $table->string('name')->nullable();
            $table->string('cpf')->nullable();
            $table->string('age')->nullable();
            $table->string('sexo')->nullable();
            $table->text('photo')->nullable();
            $table->string('cep')->nullable();
            $table->string('road')->nullable();
            $table->string('number')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('stars')->default('5');
            $table->boolean('active')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
