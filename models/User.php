<?php
class User extends ModelAbs
{
    public function __construct()
    {

    }

    public function login($username, $password)
    {
        $row = $this->row('users', "username =  '" . $username . "' AND password = '" . $password . "'");
        if (!empty($row)) {
            $_SESSION['is_admin'] = (int) $row['is_admin'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['id_user'] = (int) $row['id'];
            $_SESSION['password'] = $row['password'];
        }
        return $row;
    }

    public function checkLoginGoogle($userData = array())
    {
//        echo "<pre>";
//        print_r($userData);
//        echo "</pre>";
//        die;
        $checkUser = $this->rows('users',"id = '". $userData['id'] . " AND oauth_provider ='" . $userData['oauth_provider'] . "' ");
        if (empty($checkUser)) {
            $this->insert('users',
                " `oauth_provider`, `id`, `name`, `first_name`, `last_name`, `email`, `picture`, `link`, `locale`, `gender`",
                "'" . $userData['oauth_provider'] . "',
                '" . $userData['id'] . "', 
                '" . $userData['name'] . "',
                '" . $userData['first_name'] . "',
                '" . $userData['last_name'] . "',
                '" . $userData['email'] . "',
                '" . $userData['picture'] . "',
                '" . $userData['link'] . "',
                '" . $userData['locale'] . "',
                '" . $userData['gender'] ."' ");
        } else {
            $this->update('users',
                "oauth_provider = '". $userData['provider'] . "', 
                id = '" . $userData['id'] ."',
                name = '" . $userData['name'] . "',
                first_name = '" . $userData['first_name'] . "', 
                last_name = '" . $userData['last_name'] . "',
                email = '" . $userData['email'] . "',
                picture = '" . $userData['picture'] . "',
                link = '" . $userData['link'] . "',
                gender = '" . $userData['gender'] . "' ",
                "oauth_provider = '" . $userData['oauth_provider'] . "' AND id = '" . $userData['id'] . "' ") ;
        }
        return $userData;
    }

    public function checkLoginFacebook ($userData = array()) {
        $checkUser = $this->rows('users',"id = '". $userData['id'] . " AND oauth_provider ='" . $userData['oauth_provider'] . "' ");
        if (empty($checkUser)) {
            $this->insert('users'," `oauth_provider`, `id`, `name`, `first_name`, `last_name`, `email`",
                "'" . $userData['oauth_provider'] . "',
                '" . $userData['id'] . "',
                '" . $userData['name'] . "',
                '" . $userData['first_name'] . "',
                '" . $userData['last_name'] . "',
                '" . $userData['email'] . "'");
        } else {
            $this->update('users',
                "oauth_provider = '". $userData['provider'] . "',
                 id = '" . $userData['id'] ."',
                 name = '" . $userData['name'] . "',
                 first_name = '" . $userData['first_name'] . "',
                 last_name = '" . $userData['last_name'] . "',
                 email = '" . $userData['email'] . "' ",
                "oauth_provider = '" . $userData['oauth_provider'] . "' AND id = '" . $userData['id'] . "' ");
        }
        return $userData;
    }

    public function checkSignUp($username, $email)
    {
        $row = $this->row('users', "username =  '" . $username . "' AND email = '" . $email . "'");
        return $row;
    }

    public function insertSignUp ($name, $email, $phone, $username, $password, $gender, $address)
    {
        $insert = $this->insert("users", "`name`, `email`, `phone`, `username`, `password`, `gender`, `address`",
            "'$name', '$email', '$phone', '$username', '$password', '$gender', '$address'");
        return $insert;
    }

    public function contract($name, $email, $phone, $tableNoMal, $tableVip, $menu, $request)
    {
        $insert = $this->insert('users', "`name`,`email`,`phone`,`table_nomal`,`table_vip`,`menu`,`request`",
            "'$name','$email', '$phone','$tableNoMal','$tableVip','$menu','$request'");
        return $insert;
    }

    public function detailUser ($idUser)
    {
        $detail = $this->row ('users', "id_user = '".$idUser."'");
        return $detail;
    }

    public function listUser ()
    {
        $data = array();
        $listUser = $this->rows("users", "`is_admin`, `name`, `username`, `email`, `phone`");
        if (empty($listUser)) {
            die("No query result.");
        }
        foreach ($listUser as $row)
            $data[] = $row;
        return $data;
    }

    public function deleteUser ($idUser)
    {
        $delete = $this->delete('users', "`id_user` = '". $idUser ."'");
        return $delete;
    }

    public function updateUser ()
    {

    }
}
