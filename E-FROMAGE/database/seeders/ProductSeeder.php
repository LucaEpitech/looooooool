<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=>'fromage de chèvre',
            'description'=>'je suis un fromage de chèvre',
            'image'=>'image1',
            'prix'=>'12',
            'stock'=>'41'
            ]);
        }
}
