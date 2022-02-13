<?php

use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publishers =  [
            [
                'name' => 'A.J Wilson',
            ],
            [
                'name' => 'Peak Ville',
            ],
            [
                'name' => 'Jeff Bill',
            ],
            [
                'name' => 'Mark Hurt',
            ]
        ];

        \App\Publisher::insert($publishers);
    }
}
