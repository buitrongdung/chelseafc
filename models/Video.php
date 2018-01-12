<?php
class Video extends ModelAbs
{

    public function __construct()
    {

    }
    public function uploadVideo($name, $size, $type, $link) {
        $upVideo = $this->insert('video', "`name`, `size`, `type_video`, `link`", "'$name', '$size', '$type', '$link'");
        return $upVideo;
    }

}