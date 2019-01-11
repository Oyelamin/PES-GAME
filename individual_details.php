<?php
        //================connection to the database ==========================//
$connect= mysqli_connect("localhost","root","","games");
        //===================================== Query starts ==============================================================//
        
        //====================================== Query for the table=============================================//
        
$query_name=mysqli_query($connect,"SELECT game_sessions.home_player,users.firstname,users.lastname from game_sessions join users on users.id=home_player where game_sessions.id > 0 and game_sessions.id < 19 GROUP BY game_sessions.id");
$query_away_player_name=mysqli_query($connect,"SELECT game_sessions.away_player,users.firstname,users.lastname from game_sessions join users on users.id=away_player where game_sessions.id > 0 and game_sessions.id < 19 GROUP BY game_sessions.id");
$query_player1_team=mysqli_query($connect,"SELECT clubs.name from game_sessions join clubs on clubs.id=home_player_team where game_sessions.id > 0 and game_sessions.id < 19 GROUP BY game_sessions.id");
$query_player2_team=mysqli_query($connect,"SELECT clubs.name from game_sessions join clubs on clubs.id=away_player_team where game_sessions.id > 0 and game_sessions.id < 19 GROUP BY game_sessions.id");
$query_player_goals=mysqli_query($connect,"SELECT game_sessions.home_player_goal,game_sessions.away_player_goal from game_sessions where game_sessions.id > 0 and game_sessions.id < 19 GROUP BY game_sessions.id");
$query_tournament=mysqli_query($connect,"SELECT tournaments.name from game_sessions join tournaments on tournaments.id=tournament where game_sessions.id > 0 and game_sessions.id < 19 GROUP BY game_sessions.id");
$query_game_type=mysqli_query($connect,"SELECT game_types.name from game_sessions join game_types on game_types.id=game_type where game_sessions.id > 0 and game_sessions.id < 19 GROUP BY game_sessions.id");
$query_date=mysqli_query($connect,"SELECT game_sessions.game_played_date FROM `game_sessions` where game_sessions.id > 0 and game_sessions.id < 19 GROUP BY game_sessions.id");
$query_home_player_sum=mysqli_query($connect,"SELECT sum(home_player_goal), sum(away_player_goal) from game_sessions where game_sessions.id > 0 and game_sessions.id < 19 GROUP BY game_sessions.id");

        //============================ Query ends===================================================================//
?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
            <style>
                body{
                    margin:0px auto;
                }
                table{
                    margin:0px auto;
                    padding:10px;
                    margin-bottom:20px;
                }
                h1{
                    text-align:center;
                }
            </style>
        </head>
        <body>
            <h1>Ayobami David Records </h1><br/><hr/ style="height:5px;background:darkorange;width:120px;margin-top:-20px;margin-bottom:30px;">
        <!--=======================TABLE==========================================-->
            <div class="table1">
                <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">
                            Home-Player
                        </th>
                        <th scope="col">Away-Player</th>
                        <th scope="col">Home-Player-Team</th>
                        <th scope="col">Away-Player-Team</th>
                        <th scope="col">Home-Player-Goal</th>
                        <th scope="col">Away-Player-Goal</th>
                        <th scope="col">Tournaments</th>
                        <th scope="col">Game-Type</th>
                        <th scope="col">Game-Played-Date</th>
                    </tr>
                </thead>
                <?php
                while($row1=mysqli_fetch_array($query_name)
                      AND $row2=mysqli_fetch_array($query_player1_team)
                      AND $row3=mysqli_fetch_array($query_player2_team)
                      AND $row4=mysqli_fetch_array($query_player_goals)
                      AND $row5=mysqli_fetch_array($query_tournament)
                      AND $row6=mysqli_fetch_array($query_game_type)
                      AND $row7=mysqli_fetch_array($query_date)
                      AND $row8=mysqli_fetch_array($query_away_player_name)
                      ){
                    echo "<tbody><tr><td>".$row1[1]." ".$row1[2]."</td><td>"
                    .$row8[1]." ".$row8[2]."</td><td>".$row2[0]."</td><td>"
                    .$row3[0]."</td><td>".$row4[0]."</td><td>".$row4[1]
                    ."</td><td>".$row5[0]."</td><td>".$row6[0]
                    ."</td><td>".$row7[0]."</td></tr></tbody>";
                   
                
                }
                ?>
            </table>

            <br/>
            
            
            </div>
            
            <script src="js/jquery-1.9.1.min.js"></script>


<select>
    <?php 
            
            while($row4=mysqli_fetch_array($query_name)):;
    ?>
    <option><?php echo $row4[0];?></option>
<?php endwhile; ?>
    </select>
        </body>
    </html>