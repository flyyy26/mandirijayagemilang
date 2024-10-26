<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDistributorToWhatsappsTable extends Migration
{
    public function up()
    {
        Schema::table('whatsapps', function (Blueprint $table) {
            $table->text('distributor')->nullable(); // Menambahkan kolom distributor
        });
    }

    public function down()
    {
        Schema::table('whatsapps', function (Blueprint $table) {
            $table->dropColumn('distributor'); // Menghapus kolom distributor jika migrasi di-revert
        });
    }
}
