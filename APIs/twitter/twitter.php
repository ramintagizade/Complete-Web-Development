<?php

  session_start();
  //include("twitteroauth-master/src/TwitterOAuth.php");
  require "twitteroauth/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;
  $apikey       = "J8OAbHsZmex1vsK7E4QP96a5R";
  $apisecret    = "RO6M528ZrvMwmzdlYyOMocjEcPIDAfykvqcv60N0zimHlem7MC";
  $accesstoken  = "787356311709159424pguR9NOhZKGGTVh3VOpgRC3nP6cMyVp";
  $accesssecret = "YPsShS9hsGIwDMUrkETMLGW0D63lCUsgix4fURQU3FdwV";

  $connection = new TwitterOAuth($apikey,$apisecret,$accesstoken,$accesssecret);
  $content = $connection->get('account/verify_credentials');
  $tweets = $connection->get('search/tweets', array("q" => "iphone", "result_type" => "recent", "count" => 20));
  //print_r ($tweets);

  echo "done ";
?>
