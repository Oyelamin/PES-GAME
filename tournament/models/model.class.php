<?php
//============== db Connection=============//

$connect=mysqli_connect("localhost","root","","new_data");

//============Query Starts======================//

$query=mysqli_query($connect,"SELECT users.firstname,
users.lastname,count(home_player),
count(away_player),sum(home_player_goal),
sum(away_player_goal),sum(home_player_goal) + sum(away_player_goal) as Total 
from game_sessions join users
on users.id=game_sessions.home_player
where tournament=4 group by home_player ");
//total game won
$query2=mysqli_query($connect,"select count(home_player) from game_sessions
                     where game_sessions.home_player_goal >
                     game_sessions.away_player_goal and tournament=4 group by home_player");
$query3=mysqli_query($connect,"select count(away_player)
                     from game_sessions
                     where game_sessions.away_player_goal >
                     game_sessions.home_player_goal and tournament=4 group by away_player");

                     // total loss query
$query4=mysqli_query($connect,"select count(home_player) from game_sessions
                     where home_player_goal < away_player_goal and tournament=4
                     group by home_player");
$query5=mysqli_query($connect,"select count(away_player) from game_sessions
                     where away_player_goal < home_player_goal and tournament=4
                     group by away_player");
$query6=mysqli_query($connect,"select count(home_player) from game_sessions
                     where home_player_goal = away_player_goal and tournament=4
                     group by home_player");
$query7=mysqli_query($connect,"select count(away_player) from game_sessions
                     where away_player_goal=home_player_goal and tournament=4
                     group by away_player");


?>
<?php
if(isset($_POST['add'])){
    $connect=mysqli_connect("localhost","root","","new_data");
    $name=$_POST['name'];
    $query_add_tournament=mysqli_query($connect,"insert into `tournaments`(`name`)Value('$name')");

}
?>