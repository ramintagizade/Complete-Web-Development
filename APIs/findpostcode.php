<!DOCTYPE html>
<html>
  <head>
  <style>
    body {
      background-image: url("background.jpg");
      background-position: 70% 30%;
    }
    #toparea {
      margin-top: 90px;
      background-color: blue;
      height: 50px;
    }
    #searcharea {
      margin-top: 200px;
      background-color: red;
      height: 90px;
    }
    #searcharea #search {
      margin-left : 550px;
      margin-top  : 45px;
    }
    #searcharea #Button {
      margin-left : 560px;
      margin-top  : 20px;
    }
    #bottomarea {
      position: relative;
      margin: 10px;
      background-color: green;
      height: 40px;
    }
    #bottomtextarea {
      position: relative;
      margin-left: 500px;
    }
  </style>
</head>
  <body>
    <div id="searcharea">

        <input id="search" value= "E.g London , New York ..."/ >
        <button onclick="findCode()" >Find My Postcode</button>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>
        <script>
          function findCode(){
            Address = document.getElementById("search").value;
            run(Address);
          }
          function run(Address){
            $.ajax({
              type: "GET",
              url:
              "https://maps.googleapis.com/maps/api/geocode/xml?address="+Address+"&key=AIzaSyAjm-OhTV_EqEv4F-MqkklBf5WdLgHKEgc",
              dataType: "xml",
              success: processXML
            }
          );
          }
          function processXML(xml) {
              console.log(xml);
               $(xml).find("address_component").each(function() {
                var arg = "";
                if($(this).find("type").text()=="postal_code") {
                  //alert($(this).find("long_name").text());
                  arg = $(this).find("long_name").text();
                }
                if(arg!=""){
                    document.getElementById("bottomtextarea").innerHTML = "Your postcode is " +arg;
                }
                else {
                    document.getElementById("bottomtextarea").innerHTML = "Cannot find postcode " ;
                }
              });
          }
        </script>
    </div>
    <div id="bottomarea">
      <div id="bottomtextarea">

      </div>
    </div>
  </body>
</html>
