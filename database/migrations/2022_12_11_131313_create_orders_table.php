<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment("Kullanıcı ID'si");
            $table->integer('document_id')->comment("Döküman ID'si");
            $table->longText('content')->comment("Döküman İçeriği");
            $table->longText('key')->comment("Hash Key");
            $table->integer('pay')->default(0)->comment("Ödeme Durumu");
            $table->decimal('price', 10, 2)->comment('Document Price');
            $table->string('statistics')->comment("İstatistik İçin Tarih");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
