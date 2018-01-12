<?php
$is_https = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] !== 'off'));
$is_secure = ($is_https || ($_SERVER['SERVER_PORT'] == 443));
$scheme = $is_secure ? 'https' : 'http';
$xCmd = isset($_REQUEST['cmd']) ? strtolower($_REQUEST['cmd']) : '';
$WSDL = "{$scheme}://{$_SERVER['HTTP_HOST']}/xmlapi/soap/wsdl";
$URI = "{$scheme}://{$_SERVER['HTTP_HOST']}/xmlapi/soap/";

if ($xCmd = 'wsdl') {
    $file = 'chelsea.wsdl';
    $strWSDL = '';
    if (file_exists($file) && file_exists($file) > 0) {
        $ifile = fopen($file, "r");
        if ($ifile) {
            $strWSDL= fread($ifile, filesize($file));
            fclose($ifile);
        }
    }
    $strWSDL = str_replace('{URI}', $URI, $strWSDL);
    $strWSDL = str_replace('{LOCATION}', $URI, $strWSDL);
    header('Content-Type: text/xml');
    print($strWSDL);
    exit;
}
$server = new SoapServer($WSDL, array(
   'trace' => 1,
   'uri' => $URI,
   'cache_wsdl' => WSDL_CACHE_BOTH
));

$server->addFunction('getProductList');
$server->handle();
exit;
