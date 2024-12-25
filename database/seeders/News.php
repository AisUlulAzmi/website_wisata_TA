<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class News extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = 'news';
        $json = database_path('seeders/json/news.json');
        $img = database_path('seeders/img/news');

        if (DB::table($table)->count() === 0 and file_exists($json)) {
            $payload = json_decode(file_get_contents($json), true);
            foreach ($payload as $data) {DB::table($table)->insert($data);}

            // Copy all images to storage folder
            if ($img and file_exists($img)) {
                $destination = storage_path('app/public');
                if (!file_exists($destination)) {mkdir($destination, 0777, true);}

                $files = glob($img . '/*');
                foreach ($files as $file) {
                    $name = basename($file);
                    copy($file, $destination . '/' . $name);
                }
            }
        }
    }
}
