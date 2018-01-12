<?php
class UserController extends AbsController
{
    protected $user;
    function __construct()
    {
        $this->user = new User();
    }
    public function loginAction ()
    {
//        $errors = array();
        if (isset($_POST['submit'])) {
            $result = $this->user->login($_POST['user'], md5($_POST['pass']));
            if (!$result) {
                header('location:' . $_SERVER['HTTP_REFERER']);
                return false;
            }
            elseif ($_SESSION['is_admin'] == 1)
                header ('location: /admin/users/index');
            else
                header('Location: /index');
        }
        $data['login'] = "";
        $this->render('index/login', $data);
    }

    function signUpAction()
    {
        $error = array();
        if (isset($_POST['submit'])) {
            $result = $this->user->checkSignUp($_POST['username'], $_POST['email']);
            if (!$result) {
                $error['username'] = "Tên đăng nhập đã tồn tại.";
                $error['email'] = 'Email đã tồn tại.';
                header ('location:'. $_SERVER['HTTP_REFERER']);
            } else {
                $this->user->insertSignUp($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['username'], md5($_POST['password']), $_POST['gioiTinh'], $_POST['address']);
                header ('location: /user/login');
            }
        }
        $data['signUp'] = '';
        $this->render('index/signUp', $data);
    }
    function logoutAction ()
    {
        session_unset();
        session_destroy();
        header('location: /index');
    }
    public function contractAction()
    {
        if (isset($_POST['submit'])) {
            $result = $this->user->contract($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['noMal'],$_POST['vip'],$_POST['menu'], $_POST['request']);
            if (!empty($result)) {
                echo "Cảm ơn quý khách đã ghé thăm nhà hàng";
            }
            header('location:/index');
        }
        $data['contract'] = '';
        $this->render('index/contract', $data);
    }

    public function facebookAction ()
    {
        $fb = new Facebook\Facebook([
            'app_id' => '1240379729364369',
            'app_secret' => 'cb005d997038d6939c5720eb65bdb08e',
            'default_graph_version' => 'v2.4',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email']; // facebook yeu cau can phai co email

        try {
            if (isset($_SESSION['facebook_access_token'])) {
                $accessToken = $_SESSION['facebook_access_token'];
            } else {
                $accessToken = $helper->getAccessToken();
            }
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        if (isset($accessToken)) {
            if (isset($_SESSION['facebook_access_token'])) {
                $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            } else {
                // getting short-lived access token
                $_SESSION['facebook_access_token'] = (string) $accessToken;
                // OAuth 2.0 client handler
                $oAuth2Client = $fb->getOAuth2Client();
                // Exchanges a short-lived access token for a long-lived one
                $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
                $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
                // setting default access token to be used in script
                $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            }
            // redirect the user back to the same page if it has "code" GET variable
            if (isset($_GET['code'])) {
                header('Location: ./');
            }
            // getting basic info about user
            try {
                $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
                $profile = $profile_request->getGraphNode()->asArray();
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                session_destroy();
                // redirecting user back to app login page
                header("Location: ./");
                exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }
            $facebookUser = array(
                'oauth_provider' => 'facebook',
                'id' => $profile['id'],
                'name' => $profile['name'],
                'email' => $profile['email'],
                'first_name' => $profile['first_name'],
                'last_name' => $profile['last_name']
            );
            $this->user->checkLoginFacebook($facebookUser);
            $_SESSION['name'] = $profile['name'];
            $_SESSION['email'] = $profile['email'];
            $_SESSION['id'] = (int) $profile['id'];

//            $_SESSION['first_name'] = $profile['first_name'];
//            $_SESSION['name'] = $profile['name'];
//            $_SESSION['email'] = $profile['email'];
//            $_SESSION['id'] = (int) $profile['id'];
//            $this->user->checkLogin($_SESSION['id'], $_SESSION['name'], $_SESSION['email']);
            // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
            header('Location: /index');
        } else {
            // replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
            $loginUrl = $helper->getLoginUrl('http://' . $_SERVER['HTTP_HOST'] . '/user/facebook', $permissions);
            header('Location:' . $loginUrl);
        }

        $data['login'] = '';
        $this->render('index/login', $data);
    }

    public function detailAction ()
    {
        //get access token api of facebook
        $fb = new Facebook\Facebook([
            'app_id' => '1240379729364369',
            'app_secret' => 'cb005d997038d6939c5720eb65bdb08e',
            'default_graph_version' => 'v2.4',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['user_photos'];

        try {
            if ( isset( $_SESSION['facebook_access_token'] ) )
                $accessToken = $_SESSION['facebook_access_token'];
            else
                $accessToken = $helper->getAccessToken();
        }
        catch (\Facebook\Exceptions\FacebookSDKException $err) {
            throw new Exception($err->getMessage());
        }
        catch (\Facebook\Exceptions\FacebookResponseException $err) {
            throw new Exception($err->getMessage());
        }
        if (isset($accessToken)) {
            if ($_SESSION['facebook_access_token'])
                $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            else {
                //nhan duoc 1 access token ngan han
                $_SESSION['facebook_access_token'] =(string) $accessToken; //access token luon o dang chuoi
                //xac nhan voi oAuth2
                $oAuth2Client = $fb->getOAuth2Client();
                //doi 1 access token ngan han sang 1 accesstoken dai han
                $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
                //truyen access token default
                $_SESSION['facebook_access_token'] = (string)$longLivedAccessToken;
                $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            }
            try {
                $fb->get('/me');
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                if ($e->getCode() == 190) {
                    unset($_SESSION['facebook_access_token']);
                    $helper = $fb->getRedirectLoginHelper();
                    $loginUrl = $helper->getLoginUrl('http://' . $_SERVER['HTTP_HOST'] . '/user/detail', $permissions);
                    echo "<script>window.top.location.href='".$loginUrl."'</script>";
                }
                exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }
            try {
                $photos_request = $fb->get('/me/photos?limit=5&type=uploaded');
                $photos = $photos_request->getGraphEdge();
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            $all_photos = array();
            if ($fb->next($photos)) {
                $photos_array = $photos->asArray();
                $all_photos = array_merge($photos_array, $all_photos);
                while ($photos = $fb->next($photos)) {
                    $photos_array = $photos->asArray();
                    $all_photos = array_merge($photos_array, $all_photos);
                }
            } else {
                $photos_array = $photos->asArray();
                $all_photos = array_merge($photos_array, $all_photos);
            }

            foreach ($all_photos as $key) {
                $photo_request = $fb->get('/'.$key['id'].'?fields=images');
                $photo = $photo_request->getGraphNode()->asArray();
//               echo '<img src="'.$photo['images'][2]['source'].'"><br>';
                echo "<pre>";
                print_r($photo);
                echo "</pre>";
            }

        } else {
            $helper = $fb->getRedirectLoginHelper();
            $loginUrl = $helper->getLoginUrl('http://' . $_SERVER['HTTP_HOST'] . '/user/detail', $permissions);
            header('Location:' . $loginUrl);
        }

        $data['detailUser'] = '';
        $this->render('user/detailUser', $data);
    }
    public function googleAction ()
    {
        $client = new Google_Client();
        $client->setAuthConfig(ROOT_PATH . '/client_secret.json');
        $client->setScopes( array('https://www.googleapis.com/auth/plus.login',
            'https://www.googleapis.com/auth/plus.me',
            'https://www.googleapis.com/auth/userinfo.email',
            'https://www.googleapis.com/auth/userinfo.profile'));
//        $client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/user/google');
        $googleOauth2 = new Google_Service_Oauth2($client);
        if (!isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();

//            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/user/google';
//            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
        if (isset($_SESSION['access_token'])) {
            $client->setAccessToken($_SESSION['access_token']);
        }
        if ($client->getAccessToken()) {
            try {
                $googleProfile = $googleOauth2->userinfo->get();
//                echo "<pre>";
//                print_r($googleProfile);
//                echo "</pre>";
//                die;
                $googleUserData = array(
                    'oauth_provider' => 'google',
                    'first_name' => $googleProfile['givenName'],
                    'last_name' => $googleProfile['familyName'],
                    'email' => $googleProfile['email'],
                    'name' => $googleProfile['name'],
                    'picture' => $googleProfile['picture'],
                    'locale' => $googleProfile['locale'],
                    'link' => $googleProfile['link'],
                    'gender' => $googleProfile['gender'],
                    'id' => $googleProfile['id']
                );
                $this->user->checkLoginGoogle($googleUserData);
                $_SESSION['id'] = $googleProfile['id'];
                $_SESSION['name'] = $googleProfile['name'];
                $_SESSION['email'] = $googleProfile['email'];

            } catch (Google_Exception $err) {
                echo "" . $err->getMessage();
                exit();
            }
            header('Location: /index');
        } else {
            $authUri = $client->createAuthUrl();
            header('Location: ' . filter_var($authUri, FILTER_SANITIZE_URL));
        }
        $data['login'] = '';
        $this->render('index/login', $data);
    }


}
