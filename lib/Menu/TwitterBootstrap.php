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

    public function addDropdownButton(\Menu\Menu $m, $menuid = 'dLabel', $url = '#', $current = false)
    {
        $mo = \Menu\MenuItem::factory('Dropdown Button', $url, 
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
        foreach ($structure as $title => $url)
        {
            if ($i == 0)
            {
                $m->addMenuItem($title, $url)->addHeader('dropdown-menu');
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
