<?php
define('DS', DIRECTORY_SEPARATOR);
$file_root = realpath(dirname(__FILE__));
?>
<?php if (extension_loaded('zlib')) {
    ob_start('ob_gzhandler');
} ?>
<?php
$files = array(
    'jquery.min.js',
    'bootstrap.min.js',
    'framework.js',
    'app.js'
);

// get the youngest file
$youngest = array("", "");
try {
    foreach ($files as $file_name) {
        $file          = $file_root . DS . $file_name;
        $youngest_temp = filemtime($file);
        if ($youngest_temp > $youngest[0]
            || empty($youngest[0])
        ) {
            $youngest[0] = $youngest_temp;
            $youngest[1] = $file;
        }
    }
} catch (\Exception $ex) {

}
// not comptible with IE8 - then use 'text/javascript'
header("content-type: application/javascript; charset: UTF-8");
if (!empty($youngest[1])) {
    //get the last-modified-date of this very file
    $lastModified = filemtime($youngest[1]);
    //get a unique hash of this file (etag)
    $etagFile = md5_file($youngest[1]);
    //get the HTTP_IF_MODIFIED_SINCE header if set
    $ifModifiedSince = (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : false);
    //get the HTTP_IF_NONE_MATCH header if set (etag: unique file hash)
    $etagHeader = (isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false);

    $cache_time = 60 * 60 * 24 * 365;
    header("Etag: $etagFile");
    header("Cache-Control: max-age=\"$cache_time\", public");
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $youngest[0]) . ' GMT');
    header("expires: " . gmdate("D, d M Y H:i:s", $youngest[0] + $cache_time) . " GMT");

    //check if the file has changed. If not, send 304 and exit
    if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $lastModified || $etagHeader == $etagFile) {
        header("HTTP/1.1 304 Not Modified");
        exit;
    }

    // COMBINE
    foreach ($files as $file_name) {
        include($file_name);
    }
}
?>