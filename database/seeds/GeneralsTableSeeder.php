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
        ['gen_group'=>'sort_search', 'gen_code'=>'alpha_asc', 'gen_value'=>'Alphabetical', 'gen_status'=>'active'],
        ['gen_group'=>'sort_search', 'gen_code'=>'rating_asc', 'gen_value'=>'Rating (Lowest to Highest)', 'gen_status'=>'active'],
        ['gen_group'=>'sort_search', 'gen_code'=>'rating_desc', 'gen_value'=>'Rating (Highest to Lowest)', 'gen_status'=>'active'],
        ['gen_group'=>'sort_search', 'gen_code'=>'created_desc', 'gen_value'=>'Latest to Oldest', 'gen_status'=>'active'],
        ['gen_group'=>'sort_search', 'gen_code'=>'created_asc', 'gen_value'=>'Oldest to Latest', 'gen_status'=>'active'],
      ]);
    }
}
