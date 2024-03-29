<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::insert([
            [
                "slug"          => 'index',
                "title"         => 'Ana Sayfa',
                "description"   => 'Ana Sayfa',
                "no_index"      => 'no',
            ],
            [
                "slug"          => 'searchresult',
                "title"         => 'Arama Sonuçları',
                "description"   => 'Arama Sonuçları',
                "no_index"      => 'no',
            ],
            [
                "slug"          => 'alldocuments',
                "title"         => 'Tüm Dökümanlar',
                "description"   => 'Tüm Dökümanlar',
                "no_index"      => 'no',
            ],
            [
                "slug"          => 'contact',
                "title"         => 'İletişim',
                "description"   => 'İletişim',
                "no_index"      => 'no',
            ],
            [
                "slug"          => 'categories',
                "title"         => 'Kategoriler',
                "description"   => 'Kategoriler',
                "no_index"      => 'no',
            ],
            [
                "slug"          => 'show',
                "title"         => 'Dökümanı Göster',
                "description"   => 'Dökümanı Göster',
                "no_index"      => 'no',
            ],
            [
                "slug"          => 'success',
                "title"         => 'İşlem Tamamlandı',
                "description"   => 'İşlem Tamamlandı',
                "no_index"      => 'no',
            ],
        ]);
    }
}
