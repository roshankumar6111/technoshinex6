<?php

function config($key, $value = null) {

  static $_config = array();

  if ($key === 'source' && file_exists($value))
    $_config = parse_ini_file($value, true);
  else if ($value == null)
    return (isset($_config[$key]) ? $_config[$key] : null);
  else
    $_config[$key] = $value;
}

function redirect($url,$params=array(),$statusCode = 303) {
    $rurl=$GLOBALS['site.root'].$url;
    if(count($params)){
        $query = http_build_query($params);
        $rurl .= "?".$query;
    }
    header('Location: ' . $rurl,true,$statusCode);
    die();
    
}

function seturl($url){
    $url=$GLOBALS['site.root'].$url;
    echo "<script>
            if(typeof window.history.pushState == 'function'){
              window.history.pushState({},'Hide', '$url');
            }

          </script>";
}

//use to show things in a arranged way
function dump($a) {
    echo "<pre>".var_export($a,true)."</pre>";
}

