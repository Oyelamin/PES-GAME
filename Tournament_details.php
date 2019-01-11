 <?php

//============== db Connection=============//

$connect=mysqli_connect("localhost","root","","games");

//============Query Starts======================//

$query=mysqli_query($connect,"SELECT users.firstname,
users.lastname,count(home_player),
count(away_player),sum(home_player_goal),
sum(away_player_goal),sum(home_player_goal) + sum(away_player_goal) as Total 
from game_sessions join users
on users.id=game_sessions.home_player
where tournament=1 GROUP BY home_player ");

//total game won
$query2=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where game_sessions.home_player_goal >
                     game_sessions.away_player_goal and tournament=1 GROUP BY home_player");
$query3=mysqli_query($connect,"SELECT count(away_player)
                     from game_sessions
                     where game_sessions.away_player_goal >
                     game_sessions.home_player_goal and tournament=1 GROUP BY away_player");

                     // total loss query
$query4=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where home_player_goal < away_player_goal and tournament=1
                     GROUP BY home_player");
$query5=mysqli_query($connect,"SELECT count(away_player) from game_sessions
                     where away_player_goal < home_player_goal and tournament=1
                     GROUP BY away_player");
$query6=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where home_player_goal = away_player_goal and tournament=1
                     GROUP BY home_player");
$query7=mysqli_query($connect,"SELECT count(away_player) from game_sessions
                     where away_player_goal=home_player_goal and tournament=1
                     GROUP BY away_player");

            /*========next query=======*/
$query_2_table=mysqli_query($connect,"SELECT users.firstname,
users.lastname,count(home_player),
count(away_player),sum(home_player_goal),
sum(away_player_goal),sum(home_player_goal) + sum(away_player_goal) as Total 
from game_sessions join users
on users.id=game_sessions.home_player
where tournament=2 GROUP BY home_player ");
//total game won

$query2_2_table=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where game_sessions.home_player_goal >
                     game_sessions.away_player_goal and tournament=2
                     GROUP BY home_player");
$query3_2_table=mysqli_query($connect,"SELECT count(away_player)
                     from game_sessions
                     where game_sessions.away_player_goal >
                     game_sessions.home_player_goal and tournament=2 GROUP BY away_player");

                     // total loss query
$query4_2_table=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where home_player_goal < away_player_goal and tournament=2
                     GROUP BY home_player");
$query5_2_table=mysqli_query($connect,"SELECT count(away_player) from game_sessions
                     where away_player_goal < home_player_goal and tournament=2
                     GROUP BY away_player");
$query6_2_table=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where home_player_goal = away_player_goal and tournament=2
                     GROUP BY home_player");
$query7_2_table=mysqli_query($connect,"SELECT count(away_player) from game_sessions
                     where away_player_goal=home_player_goal and tournament=2
                     GROUP BY away_player");

/*========3rd next query=======*/
$query_3_table=mysqli_query($connect,"SELECT users.firstname,
users.lastname,count(home_player),
count(away_player),sum(home_player_goal),
sum(away_player_goal),sum(home_player_goal) + sum(away_player_goal) as Total 
from game_sessions join users
on users.id=game_sessions.home_player
where tournament=3 GROUP BY home_player ");
//total game won

$query2_3_table=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where game_sessions.home_player_goal >
                     game_sessions.away_player_goal and tournament=3 GROUP BY home_player");
$query3_3_table=mysqli_query($connect,"SELECT count(away_player)
                     from game_sessions
                     where game_sessions.away_player_goal >
                     game_sessions.home_player_goal and tournament=3 GROUP BY away_player");
                    
                     // total loss query
$query4_3_table=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where home_player_goal < away_player_goal and tournament=3
                     GROUP BY home_player");
$query5_3_table=mysqli_query($connect,"SELECT count(away_player) from game_sessions
                     where away_player_goal < home_player_goal and tournament=3
                     GROUP BY away_player");
$query6_3_table=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where home_player_goal = away_player_goal and tournament=3
                     GROUP BY home_player");
$query7_3_table=mysqli_query($connect,"SELECT count(away_player) from game_sessions
                     where away_player_goal=home_player_goal and tournament=3
                     GROUP BY away_player");

/*========4th next query=======*/
$query_4_table=mysqli_query($connect,"SELECT users.firstname,
users.lastname,count(home_player),
count(away_player),sum(home_player_goal),
sum(away_player_goal),sum(home_player_goal) + sum(away_player_goal) as Total 
from game_sessions join users
on users.id=game_sessions.home_player
where tournament=4 GROUP BY home_player ");
//total game won
$query2_4_table=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where game_sessions.home_player_goal >
                     game_sessions.away_player_goal and tournament=4 GROUP BY home_player");
$query3_4_table=mysqli_query($connect,"SELECT count(away_player)
                     from game_sessions
                     where game_sessions.away_player_goal >
                     game_sessions.home_player_goal and tournament=4 GROUP BY away_player");
                    
                     // total loss query
$query4_4_table=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where home_player_goal < away_player_goal and tournament=4
                     GROUP BY home_player");
$query5_4_table=mysqli_query($connect,"SELECT count(away_player) from game_sessions
                     where away_player_goal < home_player_goal and tournament=4
                     GROUP BY away_player");
$query6_4_table=mysqli_query($connect,"SELECT count(home_player) from game_sessions
                     where home_player_goal = away_player_goal and tournament=4
                     GROUP BY home_player");
$query7_4_table=mysqli_query($connect,"SELECT count(away_player) from game_sessions
                     where away_player_goal=home_player_goal and tournament=4
                     GROUP BY away_player");


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
                    margin-top:30px;
                    color:white;
                    border:3px solid white;
                    
                }
                h1{
                    text-align:center;
                    padding:20px;
                    color:white;
                    margin-top:50px;
                    font-family: 'Gugi', cursive;
                    
                }
                td{
                    font-family: 'Contrail One', cursive;
                }
                body{
                    margin-top:20px;
                    transition:.5s;
                    background:url('img/pes3.jpg');
                    background-size:cover;
                    background-repeat:no-repeat;
                    background-position:right;
                    background-attachment:fixed;
                    -webkit-transition-duration-:9s;
                }
               
                *{
                    transition:.5s;
                }
                .container h1 a{
                    border:2px solid skyblue;
                    padding:10px;
                    border-radius:3px;
                }
            </style>
        </head>
        <body>
        <div class="container" style="padding:10px;">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="img/cup3.png" style="opacity:1;border-radius:120px;width:100px;">
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
                
                <?php
                while($row=mysqli_fetch_array($query)
                      AND $row2=mysqli_fetch_array($query2)
                      AND $row3=mysqli_fetch_array($query3)
                      AND $row4=mysqli_fetch_array($query4)
                      AND $row5=mysqli_fetch_array($query5)
                      AND $row6=mysqli_fetch_array($query6)
                      AND $row7=mysqli_fetch_array($query7)): ?>

                       <tbody>
                        <tr>
                            <td><?php echo $row[0]." ".$row[1];  ?></td>
                            <td><?php echo $row[2];   ?></td>
                            <td><?php echo $row[3];  ?></td>
                            <td><?php echo $row[4];   ?></td>
                            <td><?php echo $row[5]; ?></td>
                            <td><?php echo $row[6];  ?></td>
                            <td><?php echo ($row2[0] + $row3[0]);  ?></td>
                            <td><?php echo ($row4[0] + $row5[0]);  ?></td>
                            <td><?php echo ($row6[0] + $row7[0]); ?></td>
                            <td><?php echo ((($row2[0] + $row3[0]) * 3) + (($row4[0] + $row5[0]) * 0) + (($row6[0] + $row7[0]) * 1))." Points";  ?></td>
               
                        </tr>
                      </tbody>
                      <?php
                        endwhile;
                      ?>

                      <!--
                    echo "<tbody><tr><td>".$row[0]." ".$row[1]."</td><td>"
                    .$row[2]."</td><td>".$row[3]."</td><td>".$row[4].
                    "</td><td>".$row[5]."</td><td>".$row[6]."</td><td>"
                    .($row2[0] + $row3[0])."</td><td>".($row4[0] +
                    $row5[0])."</td><td>".($row6[0] + $row7[0])."</td><td>"
                    .((($row2[0] + $row3[0]) * 3) + (($row4[0] + $row5[0]) * 0) +(($row6[0] + $row7[0]) * 1))." Points"."</td></tr></tbody>";
              -->
                
            </table>
            
            <!--Next Table-->
            <div class="container" style="padding:10px;">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="img/cup5.png" style="opacity:1;width:150px;">
                    </div>
                    <div class="col-sm-6">
                        <h1>UEFA Champions League</h1>
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
                
                <?php
                while($row=mysqli_fetch_array($query_2_table)
                      AND $row2=mysqli_fetch_array($query2_2_table)
                      AND $row3=mysqli_fetch_array($query3_2_table)
                      AND $row4=mysqli_fetch_array($query4_2_table)
                      AND $row5=mysqli_fetch_array($query5_2_table)
                      AND $row6=mysqli_fetch_array($query6_2_table)
                      AND $row7=mysqli_fetch_array($query7_2_table)):?>

                       <tbody>
                        <tr>
                            <td><?php echo $row[0]." ".$row[1];  ?></td>
                            <td><?php echo $row[2];   ?></td>
                            <td><?php echo $row[3];  ?></td>
                            <td><?php echo $row[4];   ?></td>
                            <td><?php echo $row[5]; ?></td>
                            <td><?php echo $row[6];  ?></td>
                            <td><?php echo ($row2[0] + $row3[0]);  ?></td>
                            <td><?php echo ($row4[0] + $row5[0]);  ?></td>
                            <td><?php echo ($row6[0] + $row7[0]); ?></td>
                            <td><?php echo ((($row2[0] + $row3[0]) * 3) + (($row4[0] + $row5[0]) * 0) + (($row6[0] + $row7[0]) * 1))." Points";  ?></td>
               
                        </tr>
                      </tbody>
                      <?php
                        endwhile;
                      ?>

                      <!--
                    echo "<tbody><tr><td>".$row[0]." ".$row[1]."</td><td>"
                    .$row[2]."</td><td>".$row[3]."</td><td>".$row[4].
                    "</td><td>".$row[5]."</td><td>".$row[6]."</td><td>"
                    .($row2[0] + $row3[0])."</td><td>".($row4[0] +
                    $row5[0])."</td><td>".($row6[0] + $row7[0])."</td><td>"
                    .((($row2[0] + $row3[0]) * 3) + (($row4[0] + $row5[0]) * 0) +(($row6[0] + $row7[0]) * 1))." Points"."</td></tr></tbody>";
                -->
                
            </table>

             <!--===============Next Table================-->
             <div class="container" style="padding:10px;">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="img/cup4.png" style="opacity:1;width:140px;">
                    </div>
                    <div class="col-sm-6">
                        <h1>INITS International Cup</h1>
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
                
                <?php
                while($row=mysqli_fetch_array($query_3_table)
                      AND $row2=mysqli_fetch_array($query2_3_table)
                      AND $row3=mysqli_fetch_array($query3_3_table)
                      AND $row4=mysqli_fetch_array($query4_3_table)
                      AND $row5=mysqli_fetch_array($query5_3_table)
                      AND $row6=mysqli_fetch_array($query6_3_table)
                      AND $row7=mysqli_fetch_array($query7_3_table)):?>

                       <tbody>
                        <tr>
                            <td><?php echo $row[0]." ".$row[1];  ?></td>
                            <td><?php echo $row[2];   ?></td>
                            <td><?php echo $row[3];  ?></td>
                            <td><?php echo $row[4];   ?></td>
                            <td><?php echo $row[5]; ?></td>
                            <td><?php echo $row[6];  ?></td>
                            <td><?php echo ($row2[0] + $row3[0]);  ?></td>
                            <td><?php echo ($row4[0] + $row5[0]);  ?></td>
                            <td><?php echo ($row6[0] + $row7[0]); ?></td>
                            <td><?php echo ((($row2[0] + $row3[0]) * 3) + (($row4[0] + $row5[0]) * 0) + (($row6[0] + $row7[0]) * 1))." Points";  ?></td>
               
                        </tr>
                      </tbody>
                      <?php
                        endwhile;
                      ?>

                      <!--
                    echo "<tbody><tr><td>".$row[0]." ".$row[1]."</td><td>"
                    .$row[2]."</td><td>".$row[3]."</td><td>".$row[4].
                    "</td><td>".$row[5]."</td><td>".$row[6]."</td><td>"
                    .($row2[0] + $row3[0])."</td><td>".($row4[0] +
                    $row5[0])."</td><td>".($row6[0] + $row7[0])."</td><td>"
                    .((($row2[0] + $row3[0]) * 3) + (($row4[0] + $row5[0]) * 0) +(($row6[0] + $row7[0]) * 1))." Points"."</td></tr></tbody>";
            -->
                
            </table>

            <!--Next Table-->
            <div class="container" style="padding:10px;">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="img/cup6.png" style="opacity:1;width:140px;">
                    </div>
                    <div class="col-sm-4">
                        <h1>UEFA Champions</h1>
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
                
                <?php
                while($row=mysqli_fetch_array($query_4_table)
                      AND $row2=mysqli_fetch_array($query2_4_table)
                      AND $row3=mysqli_fetch_array($query3_4_table)
                      AND $row4=mysqli_fetch_array($query4_4_table)
                      AND $row5=mysqli_fetch_array($query5_4_table)
                      AND $row6=mysqli_fetch_array($query6_4_table)
                      AND $row7=mysqli_fetch_array($query7_4_table)):?>

                       <tbody>
                        <tr>
                            <td><?php echo $row[0]." ".$row[1];  ?></td>
                            <td><?php echo $row[2];   ?></td>
                            <td><?php echo $row[3];  ?></td>
                            <td><?php echo $row[4];   ?></td>
                            <td><?php echo $row[5]; ?></td>
                            <td><?php echo $row[6];  ?></td>
                            <td><?php echo ($row2[0] + $row3[0]);  ?></td>
                            <td><?php echo ($row4[0] + $row5[0]);  ?></td>
                            <td><?php echo ($row6[0] + $row7[0]); ?></td>
                            <td><?php echo ((($row2[0] + $row3[0]) * 3) + (($row4[0] + $row5[0]) * 0) + (($row6[0] + $row7[0]) * 1))." Points";  ?></td>
               
                        </tr>
                      </tbody>
                      <?php
                        endwhile;
                      ?>


                      <!--
                    echo "<tbody><tr><td>".$row[0]." ".$row[1]."</td><td>"
                    .$row[2]."</td><td>".$row[3]."</td><td>".$row[4].
                    "</td><td>".$row[5]."</td><td>".$row[6]."</td><td>"
                    .($row2[0] + $row3[0])."</td><td>".($row4[0] +
                    $row5[0])."</td><td>".($row6[0] + $row7[0])."</td><td>"
                    .((($row2[0] + $row3[0]) * 3) + (($row4[0] + $row5[0]) * 0) + (($row6[0] + $row7[0]) * 1))." Points"."</td></tr></tbody>";
                -->
            </table>
            <script src="js/jquery-1.9.1.min.js"></script>
        </body>
    </html>