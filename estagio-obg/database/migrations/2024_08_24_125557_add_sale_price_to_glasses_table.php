<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalePriceToGlassesTable extends Migration
{
    public function up()
    {
        Schema::table('glasses', function (Blueprint $table) {
            $table->decimal('sale_price', 8, 2)->after('unit_cost')->nullable();
        });
    }

    public function down()
    {
        Schema::table('glasses', function (Blueprint $table) {
            $table->dropColumn('sale_price');
        });
    }
};
