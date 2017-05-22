<?php

use Illuminate\Database\Seeder;
use App\models\report_advance;
class report_advance_report_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        report_advance::truncate();
        report_advance::insert ([
                'SeqNo'=>1,
                'ReportName'=>"各機台營運狀況報表",
                'Favorite'=>0,
                'ReportDesc'=>"各機台營運狀況報表",
                'ReportFile'=>"各機台營運狀況報表.xlsx",
            ]);
        report_advance::insert ([
                'SeqNo'=>2,
                'ReportName'=>"各機台營運狀況與現金流資訊報表",
                'Favorite'=>0,
                'ReportDesc'=>"各機台營運狀況與現金流資訊報表",
                'ReportFile'=>"各機台營運狀況與現金流資訊報表.xlsx",
            ]);
        report_advance::insert ([
                'SeqNo'=>3,
                'ReportName'=>"各機台現金流資訊報表",
                'Favorite'=>0,
                'ReportDesc'=>"各機台現金流資訊報表",
                'ReportFile'=>"各機台現金流資訊報表.xlsx",
            ]);
    }
}
