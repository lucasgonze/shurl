<?php

function generateRandomString($length = 5) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

$strs = array();
for( $i=0; $i<500; $i++){
  $strs[generateRandomString()] = 0;
}

print <<<END
RewriteEngine On

RewriteRule ^$ http://s.gonze.com [R,L]
RewriteRule ^TO$ http://s.gonze.com [R,L]

# Whenever you want to add a URL to shorten,
# replace some URL_TO_SHORTEN below with the
# URL you want to shorten.


END;

foreach ($strs as $key => $value){
  print <<<END
RewriteRule ^$key$ URL_TO_SHORTEN [R,L]

END;
}


?>
