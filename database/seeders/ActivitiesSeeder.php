<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
               'method_id' => 1,
               'name' => "Fundamental of Superintendence",
               'start' => "2022-01-02",
               'end' => "2022-01-05",
               'status' => "Selesai",
            ],
            [
                'method_id' => 1,
                'name' => "Fundamental to TIC Industry",
                'start' => "2022-01-03",
                'end' => "2022-01-05",
                'status' => "Selesai",
            ],
            [
                'method_id' => 1,
                'name' => "Rindam Bela Negara",
                'start' => "2022-01-03",
                'end' => "2022-01-05",
                'status' => "Selesai",
            ],
            [
                'method_id' => 1,
                'name' => "Basic Auditing",
                'start' => "2022-02-02",
                'end' => "2022-02-05",
                'status' => "Selesai",
            ],
            [
                'method_id' => 1,
                'name' => "Business Legal",
                'start' => "2022-02-03",
                'end' => "2022-02-05",
                'status' => "Akan Datang",
            ],
            [
                'method_id' => 1,
                'name' => "Basic Salesmanship",
                'start' => "2022-06-02",
                'end' => "2022-06-05",
                'status' => "Akan Datang",
            ],
            [
                'method_id' => 1,
                'name' => "Creative Thinking",
                'start' => "2022-06-02",
                'end' => "2022-06-05",
                'status' => "Akan Datang",
            ],
            [
                'method_id' => 1,
                'name' => "Data Analytics",
                'start' => "2022-06-02",
                'end' => "2022-06-05",
                'status' => "Akan Datang",
            ],
            [
                'method_id' => 1,
                'name' => "Managing Self Motivation",
                'start' => "2022-06-02",
                'end' => "2022-06-05",
                'status' => "Akan Datang",
            ],
            [
                'method_id' => 2,
                'name' => "Sharing Practice",
                'start' => "2022-03-02",
                'end' => "2022-03-05",
                'status' => "Berlangsung",
            ],
            [
                'method_id' => 2,
                'name' => "Sharing Practice",
                'start' => "2022-05-12",
                'end' => "2022-05-15",
                'status' => "Berlangsung",
            ],
            [
                'method_id' => 3,
                'name' => "Ask The Expert",
                'start' => "2022-03-02",
                'end' => "2022-03-05",
                'status' => "Berlangsung",
            ],
            [
                'method_id' => 3,
                'name' => "Ask The Expert",
                'start' => "2022-04-02",
                'end' => "2022-04-05",
                'status' => "Akan Datang",
            ],
            [
                'method_id' => 3,
                'name' => "Ask The Expert",
                'start' => "2022-05-02",
                'end' => "2022-05-05",
                'status' => "Akan Datang",
            ],
            [
                'method_id' => 4,
                'name' => "Group Caching",
                'start' => "2022-05-12",
                'end' => "2022-05-15",
                'status' => "Akan Datang",
            ],
            [
                'method_id' => 5,
                'name' => "Mentoring Session",
                'start' => "2022-03-12",
                'end' => "2022-03-15",
                'status' => "Akan Datang",
            ],
            [
                'method_id' => 5,
                'name' => "Mentoring Session",
                'start' => "2022-04-12",
                'end' => "2022-04-15",
                'status' => "Akan Datang",
            ],
            [
                'method_id' => 5,
                'name' => "Mentoring Session",
                'start' => "2022-05-12",
                'end' => "2022-05-15",
                'status' => "Akan Datang",
            ],
        ];

        DB::table('activities')->insert($data);
    }
}
