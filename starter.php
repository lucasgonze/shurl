<?php

function generateRandomString($length = 5) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

$strs = array();
for( $i=0; $i<500; $i++){
  $strs[generateRandomString()] = 0;
}

header("Content-type: text/plain");

print <<<END
RewriteEngine On

# If somebody hits the bare URL, it's a user error. Explain what is going on.
RewriteRule ^$ http://s.gonze.com [R,L]

# If somebody hits the stub URL, they must have mistakenly used a short URL without 
# filling it in first. Redirect them to the documentation, as a reminder.
RewriteRule ^URL_TO_SHORTEN$ http://s.gonze.com [R,L]

# Whenever you want to add a URL to shorten,
# replace some URL_TO_SHORTEN below with the
# URL you want to shorten.


END;

foreach ($strs as $key => $value){
  print <<<END
RewriteRule ^$key$ URL_TO_SHORTEN [R,L]

END;
}

print <<<END



END;


?>
