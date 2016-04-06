<?php

use Illuminate\Database\Seeder;

class GeneralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('generals')->insert([
        ['gen_group'=>'prop_tenure', 'gen_code'=>'freehold', 'gen_value'=>'Freehold', 'gen_status'=>'active'],
        ['gen_group'=>'prop_tenure', 'gen_code'=>'leasehold', 'gen_value'=>'Leaseshold', 'gen_status'=>'active'],
        ['gen_group'=>'prop_furnish', 'gen_code'=>'full', 'gen_value'=>'Fully Furnished', 'gen_status'=>'active'],
        ['gen_group'=>'prop_furnish', 'gen_code'=>'partial', 'gen_value'=>'Partially Furnished', 'gen_status'=>'active'],
        ['gen_group'=>'prop_furnish', 'gen_code'=>'none', 'gen_value'=>'Unfurnished', 'gen_status'=>'active'],
      ]);
    }
}
