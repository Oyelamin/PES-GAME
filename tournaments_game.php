<?php

//============== db Connection=============//

$connect=mysqli_connect("localhost","root","","games");

class Connection{

    public static function connect(){

        try{

            return new PDO('mysql:host=127.0.0.1;dbname=games','root','');

        }catch(PDOException $e){

            die($e->getMessage());

        }

    }

}

$pdo= Connection::connect();


//testing the connection and data verifications
/*
echo "<h1 style='color:white;'>". $first[0]."</h1>";
echo "<pre><h3 style='color:white;'>";
var_dump($run_query);
echo "</h3></pre>";
*/
//============Query Starts======================//


$query=mysqli_query($connect,"SELECT users.firstname,
users.lastname,count(home_player),
count(away_player),sum(home_player_goal),
sum(away_player_goal),sum(home_player_goal) + sum(away_player_goal) as Total 
FROM game_sessions join users
on users.id=game_sessions.home_player
WHERE tournament= 1 GROUP BY home_player ");



//total game won

$query2= mysqli_query($connect,"SELECT count(home_player) FROM game_sessions
                     WHERE game_sessions.home_player_goal >
                     game_sessions.away_player_goal AND tournament= 1 GROUP BY home_player");


$query3= mysqli_query($connect,"SELECT count(away_player)
                     FROM game_sessions
                     WHERE game_sessions.away_player_goal >
                     game_sessions.home_player_goal AND tournament=1 GROUP BY away_player");


                     // total loss query
$query4= mysqli_query($connect,"SELECT count(home_player) FROM game_sessions
                     WHERE home_player_goal < away_player_goal AND tournament= 1
                     GROUP BY home_player");


$query5= mysqli_query($connect,"SELECT count(away_player) FROM game_sessions
                     WHERE away_player_goal < home_player_goal AND tournament= 1
                     GROUP BY away_player");


$query6= mysqli_query($connect,"SELECT count(home_player) FROM game_sessions
                     WHERE home_player_goal = away_player_goal AND tournament= 1
                     GROUP BY home_player");


$query7= mysqli_query($connect,"SELECT count(away_player) FROM game_sessions
                     WHERE away_player_goal=home_player_goal AND tournament= 1
                     GROUP BY away_player");



?>


<?php


if(isset($_POST['add'])){

    
    $connect=mysqli_connect("localhost","root","","games");

    $name=$_POST['name'];
    
    $query_add_tournament=mysqli_query($connect,"insert into `tournaments`(`name`)Value('$name')");

}
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
                    .((($row2[0] + $row3[0]) * 3) + (($row4[0] + $row5[0]) * 0) + (($row6[0] + $row7[0]) * 1))." Points"."</td></tr></tbody>";
-->
                <tbody>
                    <tr>
                        <td>
                        <a href="http://localhost/advanced/Tournament_details.php" >View All Tournaments</a>
                        <td>
                        <td></td>
                        <td> 
                            <a href="#add-tournament-section" id="submit-button"> Add Tournament </a>
                        </td>
                    </tr>
                </tbody>
            </table><hr/>
           <div id="add-tournament-section">
               <h2><i>Add Tournament</i></h2>
               <form method="post" action="tournaments_game.php">
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="inputState">Tournament Name</label>
                            <input type="text" name="name" placeholder="Tournament Name" class="form-control">
                            <br/><button type="submit"  class="btn btn-lg" name="add" style="background:skyblue;width:90px;color:white;">ADD</button>
                        </div>
    
                    </div>
               </form>
           </div>
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