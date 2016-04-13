<?php

  require_once("TwitterAPIExchange.php");
  require_once("config.php");

  $file_name = "cache.txt";

  $url = "https://api.twitter.com/1.1/search/tweets.json";
  $getField = "?q=%23Paris&result_type=recent";
  $requestMethod = "GET";

  $twitter = new TwitterAPIExchange($config);

  $dataFromAPI = $twitter->setGetfield($getField)
                         ->buildOauth($url, $requestMethod)
                         ->performRequest();


  //var_dump (json_decode ($dataFromAPI)->statuses);

  $object = new StdClass();

  //Millal tegime päringu
  $object->date = date("c");
  //Saadud tweedid
  $object->statues = json_decode ($dataFromAPI)->statuses;

  file_put_contents($file_name, json_encode($object));

  echo json_encode($object);





?>
