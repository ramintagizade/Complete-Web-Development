<!doctype html>
<html>
  <head>
      <title> My First Web Page </title>
      <meta charset="utf-8" />
      <meta http-equiv="content-type" content="text/html" charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
      <style>
        html,body{
          height: 100%;
        }
        .container {
          background-image: url("weather.jpg");
          width: 100%;
          height: 100%;
          background-size: cover;
        }
        .center {
          text-align: center;
          color:white;
        }
        .white{
          color:white;
        }
        p {
          padding-top: 30px;
          padding-bottom: 30px;
        }
        button {
          margin-top: 20px;
          margin-left: 200px;
        }
        .alert{
          display: none;

        }
      </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="center"> Weather Predictor </h1>
                <p class="lead center"> Enter your city below to get a forecast weather . </p>
                <form>
                    <div class="form-group">
                      <input type="text" class="form-control" name="city" id="city" placeholder="E.g London , Paris .."/>
                      <button id = "findMyWeather" class="btn btn-success btn-lg" onclick="FindWeather()"> Find My Weather </button>
                    </div>
                </form>
            </div>
        </div>
        <div id ="success" class="alert alert-success"> </div>
            <div id="fail" class="alert alert-danger">
                Could not found weather for that city.Please try again .
        </div>
        <div id="noCity" class="alert alert-danger">
            Please enter a city .
          </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"> </script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"> </script>

    <script>
      $("#findMyWeather").click(function (event){
          event.preventDefault();
          $(".alert").hide();
          if($("#city").val()!=""){
            $.get("scraper.php?city="+$("#city").val(),function(data){
                if(data==""){

                  $("#fail").fadeIn();
                }
                else {

                  $("#success").html(data).fadeIn();
                }
            });
          }
          else {
            $("#noCity").fadeIn();
          }
      });
    </script>
  </body>
</html>
