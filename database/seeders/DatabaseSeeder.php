<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Newspaper;
use App\Models\Editions;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $newspaperNames = array('Amar Asom','Purvanchal Prahari','The Meghalaya Guardian','The NorthEast Times');
        // $newspaperCodes = array('AmarAsom','PurvanchalPrahari','TheMeghalayaGuardian','TheNorthEastTimes');
        // for ($i =0; $i<count($newspaperNames); $i++) {
        //     Newspaper::create([
        //     'id' => $i+1,
        //     'paperCode' => $newspaperCodes[$i],
        //     'name' => $newspaperNames[$i],
        // ]);
        // }


        // $editionNames = array('Guwahati','Guwahati','Guwahati','Guwahati','Jorhat');
        // $paperId = array("1","2","3","4","1");
        // for ($i =0; $i<count($editionNames); $i++) {
        //     Editions::create([
        //         'id' => $i+1,
        //         'paperId' => $paperId[$i],
        //         'name' => $editionNames[$i],
        //     ]);
        // }
    }
}
