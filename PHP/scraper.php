<?php

  $city = $_GET['city'];
  $city = str_replace(" ", "" , $city);
  $contents =  file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
  //preg_match('/3 Day Weather Forecast Summary:<\/b>
  //<p class="phrase">(.*)</s',$contents,$matches);
  $value=preg_match('/<span class=\"phrase\">(.*?)<\/span>/s',$contents,$estimates);
  print_r ($estimates[1]);
?>
