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
        ['gen_group'=>'prop_status', 'gen_code'=>'active', 'gen_value'=>'Active', 'gen_status'=>'active'],
        ['gen_group'=>'prop_status', 'gen_code'=>'inactive', 'gen_value'=>'Inactive', 'gen_status'=>'active'],
        ['gen_group'=>'prop_status', 'gen_code'=>'sold', 'gen_value'=>'Sold', 'gen_status'=>'active'],

        ['gen_group'=>'of_status', 'gen_code'=>'pending', 'gen_value'=>'Pendin Ownerg', 'gen_status'=>'active'],
        ['gen_group'=>'of_status', 'gen_code'=>'accepted', 'gen_value'=>'Owner Accepted', 'gen_status'=>'active'],
        ['gen_group'=>'of_status', 'gen_code'=>'rejected', 'gen_value'=>'Owner Rejected', 'gen_status'=>'active'],
        ['gen_group'=>'of_status', 'gen_code'=>'inprocess', 'gen_value'=>'In-process', 'gen_status'=>'active'],
        ['gen_group'=>'of_status', 'gen_code'=>'processed', 'gen_value'=>'Processed', 'gen_status'=>'active'],

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
