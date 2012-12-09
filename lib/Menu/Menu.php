<?php
namespace Menu;

class Menu
{
    private $_menu_items = array();
    
    public function __construct()
    {
        return $this;
    }
    
    public function addHeader($class = null, $id = null)
    {
        $mi = $this->getLastItem();
        $mi->addHeader($class,$id);
    }

    public function setIsLast($boolean = true)
    {
        $mi = $this->getLastItem();
        $mi->setIsLast();
        return $this;
    }

    private function getLastItem()
    {
        return end($this->_menu_items);
    }

    public function addMenuItem($title, $url, $current = false, $class = null, $id = null, $role = null, $data_toggle = null, $data_target = null, $aria_labelledby = null, $add_caret = false, $has_children = false, $is_last = false)
    {
        $mi = new MenuItem($title, $url, $class, $id, $role, $data_toggle, $data_target, $aria_labelledby);
        
        if ($current)
        {
            $mi->setCurrent();
        }
            
        if ($add_caret)
        {
            $mi->addCaret();
        }

        if ($has_children)
        {
            $mi->setHasChildren();
        }

        if ($is_last)
        {
            $mi->setIsLast();
        }

        $this->_menu_items[] = $mi;
        return $this;
    }
    
    public function addMenuItemObject(MenuItem $menuitem)
    {
        $this->_menu_items[] = $menuitem;
    }

    public function __toString()
    {
        $s = '';
        foreach ($this->_menu_items as $mi)
        {
            $s .= $mi . "\n";
        }
        return $s;
    }
}

?>