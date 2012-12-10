<?php
namespace Menu;
/**
 * TwitterBootstrap
 *
 * @author Darko Luketic <info@icod.de>
 */
class TwitterBootstrap
{
    /**
     * Used for constructor method chaining
     * Obsolete with PHP 5.4
     * @return \self
     */
    public static function factory()
    {
        return new self();
    }

    public function getNavbarHeader($brand)
    {
        $h = '<div class="navbar"><div class="navbar-inner">';
        $h .=  '<a class="brand" href="/">' . $brand . '</a>';
        return $h;
    }
    
    public function getNavbarClose()
    {
        return '</div></div>';
    }

    public function addDropdownButton(\Menu\Menu $m, $title, $url = '#', $menuid = 'dLabel', $current = false)
    {
        $mo = \Menu\MenuItem::factory($title, $url, 
                array('li' => 'dropdown', 'a' => 'dropdown-toggle'),
                array('a' => $menuid), 
                array('a' => 'button'),
                array('a' => 'dropdown'),
                array('a' => '#'),
                null)
        ->setHasChildren()
        ->addCaret();
        if ($current)
        {
            $mo->setCurrent();
        }
        $m->addMenuItemObject($mo);
        return $this;
    }
    
    public function addDropdownMenu(\Menu\Menu $m, array $structure)
    {
        $i = 0;
        $cs = count($structure)-1;
        foreach ($structure as $title => $url)
        {
            if ($i == 0)
            {
                $m->addMenuItem($title, $url)->addHeader('dropdown-menu');
            }
            else if ($i == $cs)
            {
                $m->addMenuItem($title, $url)->setIsLast();
            }
            else
            {
                $m->addMenuItem($title, $url);
            }
            $i++;
        }
        return $this;
    }
}

?>