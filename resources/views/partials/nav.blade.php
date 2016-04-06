<?php
    use App\Utilities\Menu;
?>

@if(Auth::check())
  {!!
  Menu::create(function($menu) {
      event('admin.menu.build', $menu);
  })->render();
  !!}
@endif
