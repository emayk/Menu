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
$m->addMenuItem('Page 3', '/page/3');
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
unset($m);
?>
<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="#">Title</a>
<?php
// Navbar with Dropdown
$m = new \Menu\Menu();
$m->addMenuItem('Home', '/')->addHeader('nav');
$m->addMenuItem('Link', '/link',true);
$m->addMenuItemObject(
        \Menu\MenuItem::factory('Dropdown Button', '#', array('li' => 'dropdown', 'a' => 'dropdown-toggle'),
                null, null, 'array('a' => 'dropdown', null, null)
        ->setHasChildren()
        ->addCaret()
        );
$m->addMenuItem('Dropdown Item 1', '/menu/1')->addHeader('dropdown-menu');
$m->addMenuItem('Dropdown Item 2', '/menu/2');
$m->addMenuItem('Dropdown Item 3', '/menu/3');
$m->addMenuItem('Dropdown Item 4', '/menu/4');
$m->addMenuItem('Dropdown Item 5', '/menu/5')->setIsLast();
echo $m;
?>
    </div>
</div>
<?php
/**
 * Outputs
 *
 * <div class="navbar">
 *     <div class="navbar-inner">
 *         <a class="brand" href="#">Title</a>
 * <ul class="nav"><li><a href="/">Home</a></li>
 * <li class="active"><a href="/link">Link</a></li>
 * <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Button<b class="caret"></b></a>
 * <ul class="dropdown-menu"><li><a href="/menu/1">Dropdown Item 1</a></li>
 * <li><a href="/menu/2">Dropdown Item 2</a></li>
 * <li><a href="/menu/3">Dropdown Item 3</a></li>
 * <li><a href="/menu/4">Dropdown Item 4</a></li>
 * <li><a href="/menu/5">Dropdown Item 5</a></li></li></ul>
 *     </div>
 * </div>
 */
?>