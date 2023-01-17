<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;
use Illuminate\Support\Str;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = ['html', 'css', 'javaScript', 'php', 'mysql', 'sass'];

        foreach($languages as $language){
            $new_language = new Language;
            $new_language->name = $language;
            $new_language->slug = Str::slug( $new_language->name);
            $new_language->save();
        }
     
}
}
