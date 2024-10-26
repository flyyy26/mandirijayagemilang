<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveWhatsappIdFromProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the whatsapp_id column
            $table->dropColumn('whatsapp_id');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Re-add the whatsapp_id column if rolling back
            $table->unsignedBigInteger('whatsapp_id')->nullable()->after('category_id');

            // If you previously set it as a foreign key, uncomment the following line
            // $table->foreign('whatsapp_id')->references('id')->on('whatsapp_table_name');
        });
    }
}
