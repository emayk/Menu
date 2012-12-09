<?php
namespace Menu;

/**
 * created by Darko Luketic <info@icod.de>
 */
class Menu
{
    private $_menu_items = array();
    private $_header_set = false;
    
    /**
    * 
    * @return \Menu\Menu
    */    
    public function __construct()
    {
        return $this;
    }
    /**
     * 
     * @param type $class
     * @param type $id
     */
    public function addHeader($class = null, $id = null)
    {
        $mi = $this->getLastItem();
        $mi->addHeader($class,$id);
    }

    /**
     * 
     * @param type $boolean
     * @return \Menu\Menu
     */
    public function setIsLast($boolean = true)
    {
        $mi = $this->getLastItem();
        $mi->setIsLast($boolean);
        return $this;
    }

    /**
     * 
     * @return type
     */
    private function getLastItem()
    {
        return end($this->_menu_items);
    }

    /**
     * 
     * @param type $title
     * @param type $url
     * @param type $current
     * @param type $class
     * @param type $id
     * @param type $role
     * @param type $data_toggle
     * @param type $data_target
     * @param type $aria_labelledby
     * @param type $add_caret
     * @param type $has_children
     * @param type $is_last
     * @return \Menu\Menu
     */
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
    
    /**
     * 
     * @param \Menu\MenuItem $menuitem
     */
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
        if ($this->_header_set)
        {
            $s .= '</ul>';
        }
        return $s;
    }
}

?>