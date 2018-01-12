<?php
class VideoController extends AbsController
{
    public $params;
    public $video;
    public function __construct()
    {
        $this->video = new Video();
    }
        function utf8Url($string){
        $string = strtolower($string);
        $string = str_replace( "ß", "ss", $string);
        $string = str_replace( "%", "", $string);
        $string = preg_replace("/[^_a-zA-Z0-9 -]/", "",$string);
        $string = str_replace(array('%20', ' '), '-', $string);
        $string = str_replace("----","-",$string);
        $string = str_replace("---","-",$string);
        $string = str_replace("--","-",$string);
        return $string;
    }
    function sanitizeTitle($string) {
        if(!$string) return false;
        $utf8 = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach($utf8 as $ascii=>$uni) $string = preg_replace("/($uni)/i",$ascii,$string);
        $string = $this->utf8Url($string);
        return $string;
    }
    public function addVideoAction() {
            if (isset($_POST['addVideo'])) {

                $file_name = basename($_FILES['file']['name']);
                $file_size = $_FILES['file']['size'];
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_type = $_FILES['file']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
                $upDir = "public/video/".$file_name;

//                $expensions = array("mp3", "mp4", "wma");
//
//                if (in_array($file_ext, $expensions) === false) {
//                    $errors[] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
//                }
//
//                if ($file_size > 500000000000) {
//                    $errors[] = 'Kích thước file không được lớn hơn 2MB';
//                }
                $result = $this->video->uploadVideo($this->sanitizeTitle($_POST['name']),
                    $_POST[$_FILES['file']['name']] = $file_size,
                    $_POST[$_FILES['file']['name']] = $file_type,
                    $_POST[$_FILES['file']['name']] = $upDir);
                    if (move_uploaded_file($file_tmp, $upDir) && !empty($result)) {
                        echo "<script>alert('upload thành công');</script>";
                    }else
                        header('location:' . $_SERVER['HTTP_REFERER']);;
                }


        $data['addVideo'] = '';
        $this->render('admin/video/addVideo', $data);
    }

    public function listYoutubeAction ()
    {
        $oauth2ClientSecret = 'z0zBdv9fS9gpGRCP1lbFU9j3';
        $client = new Google_Client();
        $client->setScopes(['https://www.googleapis.com/auth/youtube',
            'https://www.googleapis.com/auth/youtube.force-ssl',
            'https://www.googleapis.com/auth/youtube.upload']);
        $client->setClientId('473327568421-eetlvvo20t8kvqhhq7cqnq7kog13t6bl.apps.googleusercontent.com');
        $client->setClientSecret($oauth2ClientSecret);
        $redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . '/admin/video/list-youtube',
            FILTER_SANITIZE_URL);
        $client->setRedirectUri($redirect);
        $youtube = new Google_Service_YouTube($client);


        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
//            header('Location:' . $redirect);
        } else {
            $redirectUri = $client->createAuthUrl();
            header('Location: ' . filter_var($redirectUri, FILTER_SANITIZE_URL));
        }
        if (isset($_SESSION['access_token'])) {
            $client->setAccessToken($_SESSION['access_token']);
        }
        $htmlBody = '';
        if ($client->getAccessToken()) {
            try {
                $channelResponse = $youtube->channels->listChannels('contentDetails', ['mine' => 'true']);
                foreach ($channelResponse['items'] as $channel) {
                    $uploadListId = $channel['contentDetails']['relatedPlaylists']['uploads'];
                    $statistics = $channel['contentDetails']['statistics']['viewCount'];
                    $playListResponse = $youtube->playlistItems->listPlaylistItems('snippet',
                        ['playlistId' => $uploadListId, 'maxResults' => 10]);
//                    echo "<h3>Videos in list $uploadListId</h3><ul>";
                    echo "<h3>Videos in list $uploadListId</h3><ul>";
                    echo "<h4>Videos statistics: $statistics</h4><ul>";
                    foreach ($playListResponse['items'] as $playListItem) {
                        echo "<li> title: ". $playListItem['snippet']['title'] .
                            " upload: " . $playListItem['snippet']['publishedAt'] .
                            " ImageUrl: " . $playListItem['snippet']['thumbnails']['default']['url'] .
                            " id: " . $playListItem['snippet']['resourceId']['videoId'] . "</li>";
                    }
                    $htmlBody .= '</ul>';
                }
            }
            catch (Google_Exception $error ) {
                echo "Error: " . htmlspecialchars($error->getMessage());
            }
            catch (Google_Service_Exception $error) {
               echo "Error:" . htmlspecialchars($error->getMessage());
            }
            $_SESSION['access_token'] = $client->getAccessToken();
        } elseif ($oauth2ClientSecret == 'z0zBdv9fS9gpGRCP1lbFU9j3') {
            $htmlBody .= "Oauth2 Secret:" . $oauth2ClientSecret;
        } else {
            $state = mt_rand();
            $client->setState($state);
            $_SESSION['state'] = $state;
            $authUrl = $client->createAuthUrl();
            $htmlBody .= "$authUrl";
        }
        $data['listYoutube'] = $htmlBody;
        $this->render('admin/video/listYoutube', $data);
    }

    public function searchYoutubeAction ()
    {
        $client = new Google_Client();
        $client->setScopes(['https://www.googleapis.com/auth/youtube',
            'https://www.googleapis.com/youtube/v3/search']);
        $client->setClientId('473327568421-eetlvvo20t8kvqhhq7cqnq7kog13t6bl.apps.googleusercontent.com');
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/admin/video/search-youtube');
        $googleOauth2 = new Google_Service_Oauth2($client);
        $client->setDeveloperKey('AIzaSyCnubK7qJK34xpDVS3MdNrLhSS7QNT4mZg');

        // Define an object that will be used to make all API requests.
        $youtube = new Google_Service_YouTube($client);
        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
        } else {
            $authUrl = $client->createAuthUrl();
            header ('Location:' . filter_var($authUrl, FILTER_SANITIZE_URL));
        }
        if (isset($_SESSION['access_token'])) {
            $client->setAccessToken($_SESSION['access_token']);
        }
        if ($client->getAccessToken())
            $googleOauth2->userinfo->get();

        if (isset($_GET['q']) && isset($_GET['maxResults'])) {
            try {
                $searchResponse = $youtube->search->listSearch('id,snippet', array(
                    'q' => $_GET['q'],
                    'maxResults' => $_GET['maxResults']
                ));

                $videos = '';
                $channels = '';
                $playlists = '';

                foreach ($searchResponse['items'] as $searchResult) {
                    switch ($searchResult['id']['kind']) {
                        case 'youtube#video':
                            $videos .= sprintf('<li>%s (%s)</li>',
                                $searchResult['snippet']['title'], $searchResult['id']['videoId']);
                            break;
                        case 'youtube#channel':
                            $channels .= sprintf('<li>%s (%s)</li>',
                                $searchResult['snippet']['title'], $searchResult['id']['channelId']);
                            break;
                        case 'youtube#playlist':
                            $playlists .= sprintf('<li>%s (%s)</li>',
                                $searchResult['snippet']['title'], $searchResult['id']['playlistId']);
                            break;
                    }
                }
            } catch (Google_Service_Exception $e) {
                sprintf('<p>A service error occurred: <code>%s</code></p>',
                    htmlspecialchars($e->getMessage()));
            } catch (Google_Exception $e) {
                sprintf('<p>An client error occurred: <code>%s</code></p>',
                    htmlspecialchars($e->getMessage()));
            }
        }

        $data['searchYoutube'] = '';
        $this->render('admin/video/searchYoutube', $data);
    }
}
