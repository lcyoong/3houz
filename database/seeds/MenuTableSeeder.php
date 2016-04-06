<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('menus')->insert([
        ['menu_label'=>'Property', 'menu_uri' => 'property','menu_order' => 1, 'menu_created_by'=>1, 
          'menu_roles_allowed'=>serialize(['admin', 'member'])],
      ]);
    }
}
