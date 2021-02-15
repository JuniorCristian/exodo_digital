<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_pages')->insert([
            'phone'     => '(41) 35456-7890',
            'email'     => 'info@example.com',
            'street'    => 'João Dembinks, 3246',
            'city'      => 'Curitiba',
            'twitter'   => 'https://twitter.com/',
            'facebook'  => 'https://www.facebook.com/',
            'youtube'   => 'https://www.youtube.com/',
            'instagran' => 'https://www.instagram.com/',
            'linkedin'  => 'https://www.linkedin.com/',
        ]);
    }
}
