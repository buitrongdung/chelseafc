<?php

function ParseEmailName($strEmail)
{
    $strEmail = str_replace("'", "", $strEmail);
    $strEmail = str_replace('"', '', $strEmail);
    preg_match('/^(.*)\<(.*)\>/', $strEmail, $arr);

    if (count($arr) == 0) {
        $arr[1] = $strEmail;
        $arr[2] = $strEmail;
    }
    if ($arr[1] == '')
        $arr[1] = $arr[2];
    else if ($arr[2] == '')
        $arr[2] = $arr[1];
    return (array('name' => $arr[1], 'email' => strtolower(trim($arr[2]))));
}

function ParseEmailNameList($strEmailList)
{
    $strEmailList = trim($strEmailList);
    if (empty($strEmailList)) return (array());
    $arrEmail = explode(',', $strEmailList);
    if (count($arrEmail)==1) $arrEmail = explode(';', $strEmailList);
    $arrResult = array();
    foreach($arrEmail as $strEmail) {
        $arrResult[] = ParseEmailName($strEmail);
    }
    return ($arrResult);
}