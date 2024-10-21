<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatelensrequestsTable extends Migration
{
    public function up()
    {
        Schema::create('lensrequests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('lens_type');
            $table->integer('quantity');
            $table->string('prescription_details')->nullable(); // Detalhes sobre a receita
            $table->text('additional_notes')->nullable(); // Notas adicionais
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lensrequests');
    }
}
