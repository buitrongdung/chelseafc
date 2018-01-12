<?php
class Index extends ModelAbs
{
    protected $_sysMenu;

    public function __construct($mSysMenu = '')
    {
        $this->_sysMenu = $mSysMenu;
    }

    public function setSysMenu($sysMenu)
    {
        $this->_sysMenu = $sysMenu;
        return $this;
    }

    public function getSysMenu()
    {
        return $this->_sysMenu;
    }

    public function renderMenu()
    {
        if ($this->_sysMenu && file_exists($this->_sysMenu)) {
            $xmlElements = simplexml_load_file($this->_sysMenu);
            $elements = $xmlElements->xpath('menu');

            $out = '';
            $out .= "<ul>";
//            echo "<pre>";
//            var_dump($xml);
                foreach ($elements as $element) {
                    $li = $this->_dataBind($element);
                    $out .= $li;
                }
            $out .= "</ul>";
//                var_dump($out);
            return $out;
        } else return '';

    }

    public function _dataBind(SimpleXMLElement $element)
    {
        $elements = $element->xpath('menu');
//        echo "<pre>";
//        var_dump($element);
        $li = '';
        $url = isset($element['url']) ? (string)$element['url'] : "javascript:void(0);";
        if (!$url) $url = "javascript:void(0);";
        $title = isset($element['title']) ? (string)$element['title'] : "";
        $id = isset($element['id']) ? (string)$element['id'] : "";
        $li .= "<li";
        if ($id) {
            $li .= " id={$id} >";
        }
        if ($url && $title) {
            $a = sprintf("<a id='%s' href='%s'>%s</a>", $id, $url, $title);
            $li .= $a;
        }
        if (0 < count($elements)) {
            $ul = '';
            $ul .= "<ul>";
            foreach ($elements as $elm) {
                $emlChil = $this->_dataBind($elm);
                $ul .= $emlChil;
            }

            $ul .= "</ul>";
            if (strpos($ul, "<li" === false)) {
                $ul = '';
            }
            $li .= $ul;
        }
        $li .= "</li>";
//        var_dump($li);
        return $li;
    }
}