<?php

use App\Menu;

Event::listen('admin.menu.build', function($menu){

	if (Auth::user()->hasRole('admin')) {
		$menus = Menu::all();
		foreach ($menus as $item) {
			if (Auth::user()->hasRole(unserialize($item->menu_roles_allowed))) {
				$menu->add($item->menu_uri, $item->menu_label, url($item->menu_uri), $item->menu_order);
			}
		}
	}
	elseif (Auth::user()->hasRole('member')) {
		$menu->add('dashboard', trans('menu.dashboard'), url('dashboard'), 1);
		$menu->add('property', trans('menu.properties'), url('property'), 2);
		$menu->add('property.add', trans('menu.add_property'), url('property/create'), 1);
		$menu->add('property.list', trans('menu.list_property'), url('property'), 2);
		$menu->add('favourite', trans('menu.property_favourites'), url('favourites'), 3);
		$menu->add('key', trans('menu.offer_keys'), url('offer_key'), 4);
		$menu->add('offer', trans('menu.offers'), url('offer'), 5);
		// $menu->add('fav', 'Favourites', url('fav'), 3);
		$menu->add('profile', trans('menu.profile'), url('user/edit'), 6);
	}
});
