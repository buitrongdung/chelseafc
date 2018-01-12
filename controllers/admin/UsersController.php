<?php
class UsersController extends AbsController
{
    public $params;
    public $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function indexAction()
    {
        $data['index'] = "";
        $this->render('admin/index', $data);
    }
    public function listUserAction ()
    {
//        var_dump($_REQUEST);
//        $this->params = $_REQUEST;
        //sử dụng khi $params không để trên construct
        $list = $this->user->listUser();
        if (empty($list))
            return false;
        $data['listUser'] = $list;
        $this->render('admin/user/listUser', $data);
    }

    public function detailAction ($params = array())
    {
        //var_dump($params);
        $this->params = $params;
        $detail = $this->user->detailUser($params[0]);
        $data['list'] = $detail;
        $this->render('admin/user/detailUser', $data);
    }
    public function deleteAction ($params = array())
    {
        //var_dump($params);
        $this->params = $params;
        $list = $this->user->deleteUser($params[0]);
        if ($list)
            header('location: /admin/users/listUser');
        else
            die ('sdsad');
    }
}
