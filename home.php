<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Live Weather</title>
    <link rel="SHORTCUT ICON" href="img/logo.ico">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <style type="text/css">
        body{
            font-family: 'Raleway', sans-serif;
        }
        #detailsContainer{
            background:      
                linear-gradient(
                                rgba(23, 22, 22, 0.79), 
                                rgba(12, 12, 12, 0.08)
                                ),
                url("img/windy.jpg");
            background-size: cover;
        }

        @media only screen and (max-width: 768px){
            .bodyContainer{
                background-size: cover;
                background-position: center;
            }
        }
        #details{
            margin-top: 37px;
        }
        #details p,h1{
            text-align: center;
            color: whitesmoke;
        }
        #details p{
            padding: 35px;   
        }
        input.form-control, input.btn{
            background: transparent;
            color: whitesmoke;
        }
        input.btn{
            margin-top: 35px;
        }
        input::-webkit-input-placeholder {
            color: whitesmoke !important;
            opacity: 0.7;
        }
        .alert{
            display: none;
            margin-top: 35px;
            color: whitesmoke;
            background-color: transparent;
            border-color: whitesmoke;
        }
        .alert-success{
                        box-shadow: -3px 3px 36px 0px aquamarine;

        }
        .alert-danger{
                        box-shadow: -3px 3px 36px 0px tomato;

        }
    </style>
   </head>
    <body>
        
        <div class="bodyContainer container-fluid" id="detailsContainer">
            <div class="row">
                <div class="col-md-6 col-md-offset-3" id="details">
                    <h1>Live Weather</h1>
                    <p class="lead">Is it Windy? Sunny? or Rainy? Type in your city name and let's find out</p>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cname" id="cname" placeholder="Eg. Bangalore, Panaji, Goa">
                        </div>
                            <input type="submit" class="btn btn-default center-block" name="submit" value="Find" id="submitWeather">
                    </form>
                    <div class="alert alert-dismissible" id="resBanner">
                        
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">        
           $(".bodyContainer").css("min-height",$(window).height());

           $("#submitWeather").click(function(e){
                e.preventDefault();
                $(".alert").toggle();
                if($("#cname").val()!=""){
                    $("#resBanner").addClass("alert-success");
                    $("#resBanner").removeClass("alert-danger");
                    $.get("scrapper.php?city="+$("#cname").val(),function(data){
                        $(".alert").html(data);
                    });
                }
                else{
                    $("#resBanner").addClass("alert-danger");
                    $("#resBanner").removeClass("alert-success");
                    $(".alert").html("Please enter a valid city name");
                }

               
           });
        </script>
    </body>
</html>