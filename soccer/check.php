
<?php

$connect=mysqli_connect("localhost","root","","games");
if(isset($_POST['submit'])){
  
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    $query=mysqli_query($connect,
        "insert into users(firstname,lastname,gender,
    email,password) 
    VALUES('$firstname','$lastname','$gender',
    '$email','$password')")or die(mysqli_error($connect));
    
}



?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="refresh" content="1000"/>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="css/style.check.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/animate.css">
        <link href="https://fonts.googleapis.com/css?family=Aldrich|Amaranth|Audiowide|Bitter|Condiment|Contrail+One|Days+One|Fredericka+the+Great|Grand+Hotel|Gugi|Indie+Flower|Oleo+Script|Orbitron|Philosopher|Press+Start+2P|Rancho|Viga" rel="stylesheet">
        <!--Favicon-->
        <link href="img/favicon.png" rel="icon">
        <style>
            label{

                font-family: 'Orbitron', sans-serif;
                
            }
        </style>
    </head>
    <body>

        <!--Nav begins-->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <img src="img/inits.jpg" class="log os-animation animated bounceInRight" data-os-animation="bounceInUp" data-os-animation-delay=".2s">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="search">
                            <form method="post" class="animated bounceInDown" action="search.php">
                                <input style="color:silver;" class="input" type="text" name="search" placeholder="&#x1F50E;  Search...">
                            </form>
                            <h5 style="margin-top:-46px;float:right;margin-right:-250px;color:palegreen;" class="hfiv animated swing"><i><span class="num" style="color:skyblue;">2019</span> FOOTBALL MATCH</i></h5>               
                        </div>
                    </div>
                </div>
            </div>
            <div id="myNav" class="overlay animated bounceInDown">
            
                <!-- Button to close the overlay navigation -->
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="img/close.png"></a>
                <!-- Overlay content -->
                <div class="overlay-content">
                    <div class="home-icon" style="display:inline;">
                        <img src="img/new method/home3.png">
                        <a href="#home-section" style="text-decoration:none;">Home</a>

                    </div>
                    <div class="player-icon" style="display:inline;">
                        <img src="img/new method/player.png">
                        <a href="http://localhost/PES_GAME/players_list.php" style="text-decoration:none;">Players</a>

                    </div>
                    <div class="add-player-icon">
                        <img src="img/new method/add.png">
                        <a href="#form-section" style="text-decoration:none;">Add Player</a>

                    </div>
                    <div class="add-player-icon">
                        <img src="img/new method/tournament.png">
                        <a href="http://localhost/PES_GAME/tournaments_game.php" style="text-decoration:none;">Tournaments</a>

                    </div>
                    <div class="add-player-icon">
                        <img src="img/new method/game-records.png">
                        <a href="http://localhost/PES_GAME/Tournament_details.php" style="text-decoration:none;">Game Records</a>

                    </div>
                    <div class="add-player-icon">
                        <img src="img/new method/add-game-records.png">
                        <a href="http://localhost/PES_GAME/input_data_as_home_player.php" style="text-decoration:none;">Add Game Records</a>

                    </div>
                
                    
                </div>

                
                          
            </div>
                <div class="menu-bar" id="menu" onclick="openNav()">
                    <img src="img/menu.png" class="animated rotateIn">
                </div>
            <!-- The overlay -->
            <img src="img/ball.png" style="width:190px;height:120px; float:right;margin-left:290px;" class="animated rollIn">
        </header>
        <!--Nav ends-->
        <!--Info section-->

        <section id="home-section">
        
            <div class="container">

                <div class="row">

                    <div class="col-md-3">

                        <img src="img/soccer.png" class="footballer animated rotateIn" style="margin-top:20px;">
                        
                    </div>
                    <div class="col-lg-9" style="padding:20px;">
                        <div class="text-section">
                            <div class="show-case2">
                                
                                <h1 style="color:palegreen;text-shadow:2px 2px 2px skyblue;" class="animated bounceInUp">FIFA GAME </h1><br/>
                                
                            </div>
                            
                            <h5 style="line-height:30px;color:white;"><i>
                                We play Games on Fridays to help keep our friendships <br/>
                                and have fun with ourselves.<br/> 
                                Everyone is free to join us in this awesome match!<br/><br/></i>
                                <span class="signup-btn"><a href="#form-section" onmouseout="reveal()" id="submit-button" class="animated bounceUp" style="font-family: 'Roboto';color:palegreen;">JOIN</a></span>
                            </h5>
                        </div>
                    
                    </div>
                    <div id="low" style="position:fixed;opacity:0.7;margin-top:0px;margin-left:-60px;">
                        <div class="showcase" style="margin-top:30px;">
                            <img src="img/down.png" style="width:40px;margin-top:200px;">
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <section id="form-section">
            <div class="container">
                <hr/ style="height:5px;background:palegreen;width:120px;margin-top:-20px;margin-bottom:30px;">
                <h1 style="color:skyblue;font-family: 'Aldrich', sans-serif;" class="animated bounce">ADD PLAYER</h1>
                <form method="post" action="check.php" class="form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputName">Firstname</label>
                        <input type="text" name="firstname" class="form-control" placeholder="Firstname">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputName">Lastname</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email e.g ajalablessing49@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                        <label for="inputState">Gender</label>
                        <select name="gender" class="form-control">
                            <option selected>Male</option>
                            <option>Female</option>
                        </select>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Join Team <img src="img/02.png" style="width:30px;height:30px;"></button>
                </form>
                <hr/ style="height:5px;background:palegreen;width:220px;margin-top:40px;margin-bottom:30px;">
            </div>
            <footer>
                <div class="container" style="background:rgba(255,255,255,0.2);">
                    <div class="row">
                        <div class="col-lg-12">
                        <h6 style="text-align:center;color:rgba(8, 28, 248, 0.658);font-family:Gothland;"> INITS Football Match Copyright &copy; 2018. <br/> Designed By <span class="hand" style="font-size:26px; font-family:wingdings;">9</span>BLESSING</h6>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
        
      
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <script src="../js/scrollreveal.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery-ui.js"></script>

    <script>
    /* Open when someone clicks on the span element */
    function openNav() {
        document.getElementById("myNav").style.display= 'block';
        document.getElementById("myNav").style.height = "30%";
    }
    
    /* Close when someone clicks on the "x" symbol inside the overlay */
    function closeNav() {
        document.getElementById("myNav").style.height = "0%";
    }
    </script>
    <script>
        $('#submit-button').click(function(){
            swal({
                title:"Welcome",
                text:"Glad to have you with us",
                icon:"success"
            });
        });
    </script>
    <script>
    
        $(function(){
            $('#submit-button').click(function(){
                $('form').addClass('animated shake');
            });
        });

    </script>
    </body>
    </html>