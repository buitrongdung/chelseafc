<?php
abstract class AbsController
{
    private $layout = 'two_cols';
    private $is_rendered = false;
    protected static $data = array();
    protected static $user_info = null;
    protected static $layout_data = array(
            'page_title' => 'MVC Demo'
        );
    
    public function __construct()
    {
        
    }
    public function get_layout()
    {
        return $this->layout;
    }

    public function set_layout($layout)
    {
        $this->layout = $layout;
    }

    public function render($pageView, $data)
    {
        global $qa_db;
        if ($this->is_rendered) {
            return;
        }
        $this->is_rendered = true;
        foreach ($data as $field => $value) {
            $$field = $value;
        }

        if ($pageView) {
            $pageViewFile = ROOT_PATH . '/views/' . $pageView . '.php';
            if (!file_exists($pageViewFile)) {
                die('Not view "' . $pageView . '".');
            }
        }
        $layoutName = $this->get_layout();
        if ($layoutName) {
            $layout = ROOT_PATH . '/layouts/' . $layoutName . '.php';
            if (!file_exists($layout)) {
                die('Not found layout "' . $layoutName . '".');
            }

            $layout_data = self::$layout_data;
            
            include_once $layout;
        } elseif ($pageView) {
            include_once $pageViewFile;
        } else {
            header('Content-Type: application/json');
            echo json_encode($data);//chuyển 1 mảng hoặc 1 chuối sang JSON
        }
    }
}
