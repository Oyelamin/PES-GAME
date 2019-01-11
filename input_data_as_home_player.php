
<?php

session_start();
/*
if(isset($_POST['record'])){
    $home_player_name= $_POST['home_player_name'];
    //$name=mysqli_query($connect,"select id from users 
    where firstname=$home_player_name");
    $away_player_name= $_POST['away_player_name'];
    $home_player_team= $_POST['home_player_team'];
    $away_player_team= $_POST['away_player_team'];
    $home_player_goal= $_POST['home_player_goal'];
    $away_player_goal= $_POST['away_player_goal'];
    $game_type= $_POST['game_type'];
    $tournament= $_POST['tournament'];
    $game_played_date= $_POST['game_played_date'];
    $game_played_time= $_POST['game_played_time'];
    $add= $game_played_date." ".$game_played_time;
    $connect= mysqli_connect("localhost","root","","games");
    $insert=mysqli_query($connect,"INSERT INTO `game_sessions`(`home_player`,
     `away_player`, `home_player_team`, `away_player_team`, `home_player_goal`,
      `away_player_goal`, `tournament`, `game_type`, `game_played_date`) 
      VALUES ($query_home_player_name,'$query_away_player_name',
      '$home_player_team','$query_home_player_team','$home_player_goal',
      '$away_player_goal','$tournament','$game_type','$add')");
    $query_home_player_name= mysqli_query($connect,"select id from users where firstname=$home_player_name");
    $query_away_player_name= mysqli_query($connect,"select id from users where firstname=$away_player_name");
    $query_home_player_team= mysqli_query($connect,"select id from clubs where name=$home_player_team");
    $query_away_player_team= mysqli_query($connect,"select id from clubs where name=$away_player_team");
    $query_tournament= mysqli_query($connect,"select id from tournament where name=$tournament");
    $query_game_type= mysqli_query($connect,"select id from game_types where name=$game_type");   
}
*/
if(isset($_POST['submit'])){
    $connect=mysqli_connect("localhost","root","","games");
    $home_player_name= $_POST['home_player_name'];
    $away_player_name= $_POST['away_player_name'];
    $home_player_team= $_POST['home_player_team'];
    $away_player_team= $_POST['away_player_team'];
    $home_player_goal= $_POST['home_player_goal'];
    $away_player_goal= $_POST['away_player_goal'];
    $game_type= $_POST['game_type'];
    $tournament= $_POST['tournament'];
    $game_played_date= $_POST['game_played_date'];
    $game_played_time= $_POST['game_played_time'];
    $add= $game_played_date." ".$game_played_time;

    $mail_query=mysqli_query($connect,"SELECT email FROM users");

    $mail_row=mysqli_fetch_array($mail_query);

    $message="<h1>New Update</h1><br/>".$home_player_name." <h3>VS</h3> ".$away_player_name."---($home_playe_goal , $away_player_goal)<br/><br/>Good game!!<br/>Lets wait for the next game";
    $to='ajalablessing49@gmail.com';
    mail($to,"This is from the tournament test",$message);
    //the SELECT query
    $query_home_player_name= mysqli_query($connect,"SELECT id from users where firstname='$home_player_name'");
    $query_away_player_name= mysqli_query($connect,"SELECT id from users where firstname='$away_player_name'");
    $query_home_player_team= mysqli_query($connect,"SELECT id from clubs where name='$home_player_team'");
    $query_away_player_team= mysqli_query($connect,"SELECT id from clubs where name='$away_player_team'");
    $query_tournament= mysqli_query($connect,"SELECT id from tournaments where name='$tournament'");
    $query_game_type= mysqli_query($connect,"SELECT id from game_types where name='$game_type'");
    $row=mysqli_fetch_array($query_home_player_name);
    $row2=mysqli_fetch_array($query_away_player_name);
    $row3=mysqli_fetch_array($query_home_player_team);
    $row4=mysqli_fetch_array($query_away_player_team);
    $row5=mysqli_fetch_array($query_tournament);
    $row6=mysqli_fetch_array($query_game_type);
    $home_name_row= $row['0'];
    $away_name_row= $row2['0'];
    $home_team_row= $row3['0'];
    $away_team_row= $row4['0'];
    $tournament_row= $row5['0'];
    $game_type_row= $row6['0'];
    $insert_query= "INSERT into `game_sessions`(`home_player`, `away_player`, `home_player_team`, `away_player_team`, `home_player_goal`, `away_player_goal`, `tournament`, `game_type`,`game_played_date`) 
    VALUE('$home_name_row','$away_name_row','$home_team_row','$away_team_row','$home_player_goal','$away_player_goal'
    ,'$tournament_row','$game_type_row','$add')";
    $insert_data= mysqli_query($connect,$insert_query);
    $_SESSION['home_player_name']= $home_player_name;
    $_SESSION['success']= " You are now logged in";
    header('location: input_data_as_away_player.php');
}
    ?>

    
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style_players_input_form.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="img/favicon.png" rel="icon">
        <link href="https://fonts.googleapis.com/css?family=Aldrich|Amaranth|Audiowide|Bitter|Ceviche+One|Condiment|Contrail+One|Days+One|Fredericka+the+Great|Grand+Hotel|Gugi|Indie+Flower|Oleo+Script|Orbitron|Philosopher|Press+Start+2P|Rancho|Viga" rel="stylesheet">
        <style>
            h1{
                color:white;
                font-family: 'Gugi', cursive;
            }
            
            label{
                font-family: 'Orbitron', sans-serif;
            }
            *{
                transition:.5s;
            }
            body{
                transition:.5s;
            }
            form{
                padding:20px;
            }
        </style>
    </head>
    <body>
        <div class="container" style="padding:10px;">
            <div class="row">
                <div class="col-md-1">  
                    <img src="img/footballer.png" style="height:150px;">
                </div>
                <div class="col-md-5">
                <h1>Input Records as Home Player</h1>
                </div>
            </div>
        </div>
        
        <div class="container">
            <form method="post" action="input_data_as_home_player.php">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Home Player's Firstname</label>
                        <input type="text" style="font-family:spantaran;" name="home_player_name" class="form-control" id="inputEmail4" placeholder="Firstname">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Away Player's Firstname</label>
                        <input type="text" style="font-family:spantaran;" name="away_player_name" class="form-control" id="inputPassword4" placeholder="Firstname">
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Home Player Team</label>
                    <select id="inputState" style="font-family:spantaran;" name="home_player_team" class="form-control">
                        <option selected value="Chelsea FC">Chelsea FC</option>
                        <option value="Liverpool">Liverpool</option>
                        <option value="Besiktas">Besiktas</option>
                        <option value="FC">FC</option>
                        <option value="FC Schalke 04">FC Schalke 04</option>
                        <option value="Real Madrid">Real Madrid</option>
                        <option value="AC Milan">AC Milan</option>
                        <option value="Werder Bremen">Werder Bremen</option>
                        <option value="Zenit Sankt Petersburg">Zenit Sankt Petersburg</option>
                        <option value="Liverpool FC"> Liverpool FC</option>
                        <option value="Sevilla FC">Sevilla FC</option>
                        <option value="Villareal CF">Villareal CF</option>
                        <option value="Olympique de Marseille">Olympique de Marseille</option>
                        <option value="Feyenoord Rotterdam">Feyenoord Rotterdam</option>
                        <option value="Manchester City">Manchester City</option>
                        <option value="UC Sampdoria">UC Sampdoria</option>
                        <option value="Galatasaray SK">Galatasaray SK</option>
                        <option value="FC Steaua Bucuresti"> FC Steaua Bucuresti</option>
                        <option value="AS Monaco">AS Monaco</option>
                        <option value="Santos Futebol Clube">Santos Futebol Clube</option>
                        <option value="Red Bull Salzburg">Red Bull Salzburg</option>
                    </select>
                </div>
                <!--Away player selection-->
                <div class="form-group col-md-6">
                    <label>Away Player Team</label>
                    <select id="inputState" style="font-family:spantaran;" name="away_player_team" class="form-control">
                    <option selected value="Chelsea FC">Chelsea FC</option>
                        <option value="Liverpool">Liverpool</option>
                        <option value="Besiktas">Besiktas</option>
                        <option value="FC">FC</option>
                        <option value="FC Schalke 04">FC Schalke 04</options>
                        <option value="Real Madrid">Real Madrid</option>
                        <option value="AC Milan">AC Milan</option>
                        <option value="Werder Bremen">Werder Bremen</option>
                        <option value="Zenit Sankt Petersburg">Zenit Sankt Petersburg</option>
                        <option value="Liverpool FC"> Liverpool FC</option>
                        <option value="Sevilla FC">Sevilla FC</option>
                        <option value="Villareal CF">Villareal CF</option>
                        <option value="Olympique de Marseille">Olympique de Marseille</option>
                        <option value="Feyenoord Rotterdam">Feyenoord Rotterdam</option>
                        <option value="Manchester City">Manchester City</option>
                        <option value="UC Sampdoria">UC Sampdoria</option>
                        <option value="Galatasaray SK">Galatasaray SK</option>
                        <option value="FC Steaua Bucuresti"> FC Steaua Bucuresti</option>
                        <option value="AS Monaco">AS Monaco</option>
                        <option value="Santos Futebol Clube">Santos Futebol Clube</option>
                        <option value="Red Bull Salzburg">Red Bull Salzburg</option>
                    </select>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Home Player Goal</label>
                        <input type="number" name="home_player_goal" class="form-control" id="inputAddress2" placeholder="Home Player Goals">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Away Player Goal</label>
                        <input type="number" name="away_player_goal" class="form-control" id="inputAddress2" placeholder="Away Player Goals">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <label for="inputState">Game Type</label>
                        <select id="inputState" style="font-family:spantaran;" class="form-control" name="game_type">
                            <option selected value="FIFA">FIFA</option>
                            <option value="PES">PES</option>
                            <option value="FIFA World Cup">FIFA World Cup</option>
                            <option value="PES4">PES4</option>
                            <option value="PES3">PES3</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <label>Tournament</label>
                        <select id="inputState" style="font-family:spantaran;" class="form-control" name="tournament">
                            <option selected value="FIFAUEFA Champions">FIFAUEFA Champions</option>
                            <option value="INITS International Cup">INITS International Cup</option>
                            <option value="UEFA Champions League">UEFA Champions League</option>
                            <option value="FIFA Club World Cup">FIFA Club World Cup</option>
                            <option value="FIFA Confederations Cup">FIFA Confederations Cup</option>
                        </select>
                    </div>
                                
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Game Played Date</label>
                        <input type="date" name="game_played_date" class="form-control" id="inputAddress2" placeholder="Password">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Game Played Time</label>
                        <input type="time" name="game_played_time" class="form-control" id="inputAddress2" placeholder="Password">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" name="submit" style="padding:10px;"value="RECORD">
            </form>
        </div>
        <footer>
            <div class="container" style="background:rgba(255,255,255,0.2);">
                <div class="row">
                    <div class="col-lg-12">
                    <h6 style="text-align:center;color:#818181;font-family:Gothland;"> INITS Football Match Copyright &copy; 2018. <br/> Designed By <span class="hand" style="font-size:26px; font-family:wingdings;">9</span>BLESSING</h6>
                    </div>
                </div>
            </div>
        </footer>
        
        <script src="js/jquery-1.9.1.min.js"></script>
       
    </body>
</html>