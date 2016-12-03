<!doctype html>
<html>
  <head>
    <title> My First Webpage </title>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html" ;charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" >

    <style>
      html, body{
        height: 100%;
      }
      .container {
        background-image: url("background.jpg");
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        padding-top: 100px;
      }
      .center{
        text-align: center;
      }
      .white{
        color: white;
      }
      p{
        padding-top: 15px;
        padding-bottom: 15px;
      }
      button {
        margin-top: 20px;
        margin-bottom: 20px;
      }
      .alert{
        margin-top: 20px;
        display: none;
      }
      .whiteBackground {
        background-color: white;
        padding: 20px;
        border-radius: 20px;
      }
    </style>
  </head>
  <body>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 center whiteBackground ">
            <h1 class="center" > Postcode Finder  </h1>
            <p class="lead center"> Enter any address to find the postcode</p>
            <form>
                <div class="form-group">
                  <input type="text" class="form-control" name="address" id="address" placeholder="E.g 63 Fake Street, Faketown ...">
                </div>
                <button id="findMyPostcode" class="btn btn-success btn-lg">Find My Postcode </button>
            </form>
            <div id="success" class="alert alert-success" > Success! </div>
            <div id="fail" class="alert alert-danger"> Could not found postcode for that address , Please try again! </div>
            <div id="noCity" class="alert alert-danger"> Please enter a city ! </div>
              <div id="fail2" class="alert alert-danger"> Could not connect to server , Please try again! </div>
           </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-1.11.0.min.js"> </script>
      <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"> </script>
      <script>
          $("#findMyPostcode").click(function (event){
            var result = 0;
            $(".alert").hide();
            event.preventDefault();
            $.ajax({
                type: "GET",
                url:
                "https://maps.googleapis.com/maps/api/geocode/xml?address="+encodeURIComponent($("#address").val())+"&key=AIzaSyAjm-OhTV_EqEv4F-MqkklBf5WdLgHKEgc",
                dataType: "xml",
                success: processXML,
                error : error
            }
          );
          function error(){
            $("#fail2").fadeIn();
          }
          function processXML(xml) {
               $(xml).find("address_component").each(function() {
                if($(this).find("type").text()=="postal_code") {
                  $("#success").html("The postcode you need is  "+ $(this).find("long_name").text()).fadeIn();
                  result = 1;
                }
              });
              if(result==0){
                $("#fail").fadeIn();
              }
          }

          });
      </script>
  </body>
</html>
