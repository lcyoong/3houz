<?php

use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('property_types')->insert([
        ['prty_description'=>'Apartment/ Flat', 'prty_status'=>'active'],
        ['prty_description'=>'Condo/ Serviced Residence', 'prty_status'=>'active'],
        ['prty_description'=>'Terrace/ Link/ Townhouse', 'prty_status'=>'active'],
        ['prty_description'=>'Semi-D/Bungalow', 'prty_status'=>'active'],
        ['prty_description'=>'Residential Land', 'prty_status'=>'active'],
        ['prty_description'=>'Shop/ Office/ Retail Space', 'prty_status'=>'active'],
        ['prty_description'=>'Factory/ Warehouse', 'prty_status'=>'active'],
        ['prty_description'=>'Commercial Land', 'prty_status'=>'active'],
        ['prty_description'=>'Industrial Land', 'prty_status'=>'active'],
      ]);
    }
}
