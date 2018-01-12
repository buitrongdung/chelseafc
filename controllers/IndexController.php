<?php

include_once __DIR__ . '/AbsController.php';

class IndexController extends AbsController
{
    protected $_Index;
    protected $_Menu;
    protected $_temp;

    function __construct()
    {

    }

    public function indexAction($params = array())
    {
        global $PATH_LAYOUTS;
        $this->_temp = LoadTemplate('index/index.php');

        $this->_Menu = '/sys_menu.xml';
        $sysMenu = $PATH_LAYOUTS . $this->_Menu;
        $this->_Index =  new Index($sysMenu);
        $menu = $this->_Index->renderMenu();

        $data['index'] = $menu;
        $this->_temp = str_replace("{menu}", $menu, $this->_temp);
        $this->render('index/index', $data);

    }
}
