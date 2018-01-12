<?php
class Teams extends ModelAbs
{

    public function __construct()
    {

    }
    public function infoTeams () {
        $data = array();
        $listTeams = $this->rows('teams', "`name`, `id_team`, `image`");
        if (empty($listTeams)) die("Error: No query result.");
        foreach ($listTeams as $row)
            $data[] = $row;
        return $data;
    }
    public function getMatches ()
    {
        $matches = $this->rows('teams', 'name');
        $numbers =  array_rand($matches,20);
        return $numbers;
    }
    public function uploadImage ($name, $image)
    {
        $insert = $this->insert('teams', "`name`, `image`", "'$name', '$image'");
        return $insert;
    }
}

