<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveGlassesIdFromSalesTable extends Migration
{
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            // Remover a chave estrangeira primeiro
            $table->dropForeign(['glasses_id']);
            // Agora remover a coluna
            $table->dropColumn('glasses_id');
        });
    }

    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            // Reverter as mudanças se necessário
            $table->unsignedBigInteger('glasses_id')->nullable();
            // Recriar a chave estrangeira
            $table->foreign('glasses_id')->references('id')->on('glasses')->onDelete('cascade');
        });
    }
}
