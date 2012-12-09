<?php
require 'lib/Menu/Menu.php';
require 'lib/Menu/MenuItem.php';

$m = new Menu\Menu();
$m->addMenuItem('Home', '/', true)->addHeader('nav');
$m->addMenuItem('Page 1', '/page/1');
$m->addMenuItemObject(
\Menu\MenuItem::factory('Page 2', '/page/2')
        ->setHasChildren()
        );
$m->addMenuItem('Page 2-1', '/page/2/1', false, null, null, null, null, null, null, null, false, false)->addHeader('nav');
$m->addMenuItem('Page 2-2', '/page/2/2', false, null, null, null, null, null, null, null, false, true)->setIsLast();
$m->addMenuItem('Page 3', '/page/3')->setIsLast();
echo $m;
/*
 * Outputs
 * <ul class="nav"><li class="active"><a href="/">Home</a></li>
 * <li><a href="/page/1">Page 1</a></li>
 * <li><a href="/page/2">Page 2</a>
 * <ul class="nav"><li><a href="/page/2/1">Page 2-1</a></li>
 * <li><a href="/page/2/2">Page 2-2</a></li></li></ul>
 * <li><a href="/page/3">Page 3</a></li></li></ul>
 */
?>