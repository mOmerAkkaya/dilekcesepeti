<?php

namespace Database\Seeders;

use App\Models\Values;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Values::insert([
            [
                "type"      => 'doc_type',
                "value"     => 'Dilekçe'
            ],
            [
                "type"      => 'doc_type',
                "value"     => 'Sözleşme'
            ],
            [
                "type"      => 'sub_doc_type',
                "value"     => 'Bireysel'
            ],
            [
                "type"      => 'sub_doc_type',
                "value"     => 'Tüzel'
            ],
            [
                "type"      => 'type',
                "value"     => 'Kamu'
            ],
            [
                "type"      => 'type',
                "value"     => 'Özel'
            ],
            [
                "type"      => 'cat',
                "value"     => 'Adli'
            ],
            [
                "type"      => 'cat',
                "value"     => 'İdari'
            ],
            [
                "type"      => 'cat',
                "value"     => 'Özel'
            ],
            [
                "type"      => 'sub_cat',
                "value"     => 'Asliye Hukuk Mahkemesi'
            ],
            [
                "type"      => 'sub_cat',
                "value"     => 'Borçlar Hukuku'
            ],
            [
                "type"      => 'sub_cat',
                "value"     => 'İş Mahkemesi'
            ],
            [
                "type"      => 'sub_cat',
                "value"     => 'İşletme'
            ],
            [
                "type"      => 'sub_cat',
                "value"     => 'Miras Hukuku'
            ],
            [
                "type"      => 'sub_cat',
                "value"     => 'Özlük'
            ],
            [
                "type"      => 'sub_cat',
                "value"     => 'Suç Duyurusu'
            ],            [
                "type"      => 'sub_cat',
                "value"     => 'Sulh Hukuk Mahkemesi'
            ],            [
                "type"      => 'sub_cat',
                "value"     => 'Trafik Mahkemesi'
            ],            [
                "type"      => 'sub_cat',
                "value"     => 'Üniversite'
            ]
        ]);
    }
}
