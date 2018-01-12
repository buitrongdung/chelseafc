<?php
function LoadTemplate($fileName)
{
    $template = ROOT_PATH . "/views/" . $fileName;
    $content = file_get_contents($template);
    if (!$content) return '';
    return ($content);
}