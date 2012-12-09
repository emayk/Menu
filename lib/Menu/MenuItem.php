<?php
namespace Menu;

class MenuItem
{
    private $_title = "";
    private $_url = "";
    private $_class = array();
    private $_id = array();
    private $_role = array();
    private $_data_toggle = array();
    private $_data_target = array();
    private $_aria_labelledby = array();

    private $_has_children = false;
    private $_add_caret = false;
    private $_is_last = false;

    private $_header = array();
    private $_has_header = false;

    public function __construct($title, $url, $class = null, $id = null, $role = null, $data_toggle = null, $data_target = null, $aria_labelledby = null)
    {
        $this->_title = $title;
        $this->_url = $url;
        $this->_class = $class;
        $this->_id = $id;
        $this->_data_toggle = $data_toggle;
        $this->_data_target = $data_target;
        $this->_aria_labelledby = $aria_labelledby;
        return $this;
    }

    public static function factory($title, $url, $class = null, $id = null, $role = null, $data_toggle = null, $data_target = null, $aria_labelledby = null)
    {
        return new self($title, $url, $class = null, $id = null, $role = null, $data_toggle = null, $data_target = null, $aria_labelledby = null);
    }

    public function setCurrent($what = 'li', $css_class = 'active')
    {
        switch ($what)
        {
            case 'li':
                if (isset($this->_class['li']))
                {
                    $this->_class['li'] .= ' ' . $css_class;
                }
                else
                {
                    $this->_class['li'] = $css_class;
                }
                break;
            case 'a':
                if (isset($this->_class['a']))
                {
                    $this->_class['a'] .= ' ' . $css_class;
                }
                else
                {
                    $this->_class['a'] = $css_class;
                }
                break;
        }
        return $this;
    }

    public function addHeader($class = null, $id = null)
    {
        if (!is_null($class))
        {
            $this->_header['class'] = $class;
        }
        if (!is_null($id))
        {
            $this->_header['id'] = $id;
        }
        $this->_has_header = true;
        return $this;
    }

    public function addCaret($boolean = true)
    {
        $this->_add_caret = $boolean;
        return $this;
    }
    
    public function setHasChildren($boolean = true)
    {
        $this->_has_children = $boolean;
        return $this;
    }
    
    public function setIsLast($boolean = true)
    {
        $this->_is_last = $boolean;
        return $this;
    }

    public function setRole($role)
    {
        $this->_role = $role;
        return $this;
    }

    public function setData_toggle($data_toggle)
    {
        $this->_data_toggle = $data_toggle;
        return $this;
    }

    public function setData_target($data_target)
    {
        $this->_data_target = $data_target;
        return $this;
    }

    public function setAria_labelledby($aria_labelledby)
    {
        $this->_aria_labelledby = $aria_labelledby;
        return $this;
    }

    public function __toString()
    {
        $s = '';
        if ($this->_has_header)
        {
            $s .= '<ul';
            $s .= isset($this->_header['class']) ? ' class="' . $this->_header['class'] . '"' : "";
            $s .= isset($this->_header['id']) ? ' id="' . $this->_header['id'] . '"' : "";
            $s .= '>';
        }
        $s .= '<li';
        $s .= isset($this->_class['li']) ? ' class="' . $this->_class['li'] . '"' : '';
        $s .= isset($this->_id['li']) ? ' id="' . $this->_id['li'] . '"' : "";
        $s .= isset($this->_role['li']) ? ' id="' . $this->_role['li'] . '"' : "";
        $s .= isset($this->_data_toggle['li']) ? ' id="' . $this->_data_toggle['li'] . '"' : '';
        $s .= isset($this->_data_target['li']) ? ' id="' . $this->_data_target['li'] . '"' : "";
        $s .= isset($this->_aria_labelledby['li']) ? ' id="' . $this->_aria_labelledby['li'] . '"' : "";
        $s .= '>';
        $s .= '<a href="' . $this->_url . '"';
        $s .= isset($this->_class['a']) ? ' class="' . $this->_class['a'] . '"' : '';
        $s .= isset($this->_id['a']) ? ' id="' . $this->_id['a'] . '"' : '';
        $s .= isset($this->_role['a']) ? ' id="' . $this->_role['a'] . '"' : "";
        $s .= isset($this->_data_toggle['a']) ? ' id="' . $this->_data_toggle['a'] . '"' : '';
        $s .= isset($this->_data_target['a']) ? ' id="' . $this->_data_target['a'] . '"' : "";
        $s .= isset($this->_aria_labelledby['a']) ? ' id="' . $this->_aria_labelledby['a'] . '"' : "";
        $s .= '>' . $this->_title;
        $s .= ($this->_add_caret === true) ? '<b class="caret"></b>' : '';
        $s .= '</a>';
        $s .= ($this->_has_children === false) ? '</li>' : "";
        $s .= ($this->_is_last === true) ? '</li></ul>' : "";

        return $s;
    }
}
?>
