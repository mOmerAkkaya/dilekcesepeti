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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->comment('Document URL');
            $table->integer('doc_type')->comment('Document Type - 1: Dilekçe - 2: Sözleşme');
            $table->integer('sub_doc_type')->comment('Sub Document Type - 1: Bireysel - 2: Tüzel');
            $table->integer('type')->comment('Type - 1: Kamu - 2: Özel');
            $table->integer('cat')->comment('Categories');
            $table->integer('sub_cat')->comment('Sub Categories');;
            $table->string('lang')->default("tr")->comment('Language');
            $table->string('name')->comment('Document Name');
            $table->longText('description')->comment('Document Description');
            $table->longText('law')->nullable()->comment('Document Law Number');
            $table->longText('steps')->nullable()->comment('Document Steps');
            $table->longText('template')->nullable()->comment('Document Template');
            $table->integer('attachment')->nullable()->comment('Ready Document Template');
            $table->integer('time')->nullable()->comment('Document Filling Time');
            $table->decimal('price',10, 2)->comment('Document Price');
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
        Schema::dropIfExists('documents');
    }
};
