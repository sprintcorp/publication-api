<?php

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors =  [
            [
                'name' => 'Billy jean',
            ],
            [
                'name' => 'John doe',
            ],
            [
                'name' => 'Djed spence',
            ],
            [
                'name' => 'Kim bill',
            ]
        ];

        \App\Author::insert($authors);
    }
}
