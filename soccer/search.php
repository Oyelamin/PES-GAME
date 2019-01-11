<?php

//============== db Connection=============//

$connect=mysqli_connect("localhost","root","","games");


if(!$connect){


    echo "<h1 style='color:white;'>Unable to connect to the database</h1>";


}


//============Query Starts======================//

$search=$_POST['search'];
$query=mysqli_query($connect,"SELECT users.firstname,
users.lastname,count(home_player),
count(away_player),sum(home_player_goal),
sum(away_player_goal),sum(home_player_goal) + sum(away_player_goal) as Total 
from users join game_sessions
on users.id=game_sessions.home_player
where firstname= '$search' group by home_player ");

//total game won
$select_id=mysqli_query($connect,"SELECT id from users where firstname= '$search'");

$row_id=mysqli_fetch_array($select_id);

$query2=mysqli_query($connect,"SELECT count(home_player) from  game_sessions
                    
                     where game_sessions.home_player_goal >
                     game_sessions.away_player_goal and home_player= '$row_id[0]' group by home_player");


$query3=mysqli_query($connect,"SELECT count(away_player)
                     from game_sessions
                     where game_sessions.away_player_goal >
                     game_sessions.home_player_goal and away_player= '$row_id[0]' group by away_player");


                     // total loss query
$query4=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where home_player_goal < away_player_goal and home_player= '$row_id[0]'
                     group by home_player");


$query5=mysqli_query($connect,"SELECT count(away_player) from game_sessions
                     where away_player_goal < home_player_goal and away_player= '$row_id[0]'
                     group by away_player");


$query6=mysqli_query($connect,"SELECT count(home_player) from  game_sessions
                     where home_player_goal = away_player_goal and home_player= '$row_id[0]'
                     group by home_player");


$query7=mysqli_query($connect,"SELECT count(away_player) from game_sessions
                     where away_player_goal = home_player_goal and away_player=' $row_id[0]'
                     group by away_player");


$row=mysqli_fetch_array($query);
$row2=mysqli_fetch_array($query2);
$row3=mysqli_fetch_array($query3);
$row4=mysqli_fetch_array($query4);
$row5=mysqli_fetch_array($query5);
$row6=mysqli_fetch_array($query6);
$row7=mysqli_fetch_array($query7);


?>


<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
            <link href="https://fonts.googleapis.com/css?family=Aldrich|Amaranth|Audiowide|Bitter|Condiment|Contrail+One|Days+One|Fredericka+the+Great|Grand+Hotel|Gugi|Indie+Flower|Oleo+Script|Orbitron|Philosopher|Press+Start+2P|Rancho|Viga" rel="stylesheet">
                    <!--Favicon-->
            <link href="img/favicon.png" rel="icon">
            <style>
                table{
                    margin:0px auto;
                    color:white;
                    border:3px solid white;
                    padding:10px;
                    text-align:center;
                }
                td{
                    font-family: 'Contrail One', cursive;
                }
                h1{
                    text-align:center;
                    color:white;
                    padding:20px;
                    margin-top:80px;
                    margin-left:-40px;
                    font-family: 'Gugi', cursive;
                }
                body{
                    background:url('img/pes3.jpg');
                    background-size:cover;
                    background-repeat:no-repeat;
                    background-position:right;
                    background-attachment:fixed;
                    transition:.5s;
                }
                *{
                    transition:.5s;
                }
        
                table tbody tr td a{
                    color:white;
                    padding:10px;

                }
                table tbody tr td a:hover{
                    text-decoration:none;
                }
                #add-tournament-section{
                    background:rgba(255,255,255,0.2);
                    height:400px;
                    color:white;
                }
                input[type=text]:focus{
                    width:500px;
                    transition:.5s;
                }
                #add-tournament-section h2{
                    padding:40px;
                    font-family: 'Gugi', cursive;
                }
                form{
                    padding:20px;
                }
                button:hover{
                    background:white;
                }
                label{
                    font-family: 'Gugi', cursive;
                }
            </style>
        </head>
        <body>
            <div class="container" style="padding:10px;">
                <div class="row">
                    <div class="col-md-1">
                        <img src="img/cup3.png" style="opacity:1;width:100px;">
                    </div>
                    <div class="col-sm-5">
                        <h1>FIFA Club World Cup</h1>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name Of Player</th>
                        <th scope="col">No. of Game Played As Home Player</th>
                        <th scope="col">No. of game played As Away Player</th>
                        <th scope="col">Total Goals as Home Player</th>
                        <th scope="col">Total Goals as Away Player</th>
                        <th scope="col">Total Goals</th>
                        <th scope="col">Total Game Won</th>
                        <th scope="col">Total Game Lost</th>
                        <th scope="col">Total Draw Games</th>
                        <th scope="col">Total Points</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>

                        <td><?php echo $row[0]." ".$row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>
                        <td><?php echo $row[6]; ?></td>
                        <td><?php echo ($row2[0] + $row3[0]); ?></td>
                        <td><?php echo ($row4[0] + $row5[0]); ?></td>
                        <td><?php echo ($row6[0] + $row7[0]); ?></td>
                        <td><?php echo ((($row2[0] + $row3[0]) * 3) + (($row4[0] + $row5[0]) * 0) +(($row6[0] + $row7[0]) * 1))."points"; ?></td>

                    
                    </tr>
                </tbody>
               
                
            </table><hr/>

           <script src="js/jquery-1.9.1.min.js"></script>
           <script src="js/sweetalert.min.js"></script>
           <script>
            $('#submit-button').click(function(){
                swal({
                    title:"Good",
                    text:"Make sure you start with capital letter",
                    icon:"success"
                });
            });
    </script>
        </body>
    </html>