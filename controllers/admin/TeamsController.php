<?php
class TeamsController extends AbsController
{
    public $params;
    public $teams;

    public function __construct()
    {
        $this->teams = new Teams();
    }

    public function listTeamsAction () {
        $lists = $this->teams->infoTeams();
        if (empty($lists)) die("Error: No teams.");
        $data['listTeams'] = $lists;
        $this->render('admin/teams/listTeams', $data);
    }

    public function matchesAction ()
    {
        $list = $this->teams->getMatches();
//        echo "<pre>";
//        print_r($list);
//        echo "</pre>";

        $data['list'] = $list;
        $this->render('admin/teams/matches', $data);
    }

    public function addTeamsAction ()
    {
        $upDir = "public/img/";
        $upFile = $upDir . basename($_FILES['image']['name']);
        $img = basename($_FILES['image']['name']);
        if (isset($_POST['addTeams'])) {
            $result = $this->teams->uploadImage($_POST['name'], $_POST['image'] = $img);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $upFile) && !empty($result)) {
                echo "<script>alert('upload thành công');</script>";
            }else
                header('location:' . $_SERVER['HTTP_REFERER']);
        }
        $data['addTeams'] = '';
        $this->render('admin/teams/addTeams', $data);
    }

}
