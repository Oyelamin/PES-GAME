<?php
$connect=mysqli_connect("localhost","root","","games");
$query=mysqli_query($connect,"select firstname,lastname,email,gender from users");

//var_dump($query);

?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
            <link href="https://fonts.googleapis.com/css?family=Aldrich|Amaranth|Audiowide|Bitter|Ceviche+One|Condiment|Contrail+One|Days+One|Fredericka+the+Great|Grand+Hotel|Gugi|Indie+Flower|Oleo+Script|Orbitron|Philosopher|Press+Start+2P|Rancho|Righteous|Viga" rel="stylesheet">
                    <!--Favicon-->
            <link href="img/favicon.png" rel="icon">
            <link rel="stylesheet" href="css\players_style.css" type="text/css">
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="img/icon1.png" style="opacity:1;border-radius:120px;width:100px;">
                    </div>
                    <div class="col-sm-2">
                        <h1 style="font-family: 'Condiment', cursive;">Players</h1>
                    </div>
                </div>
            </div>
           
            <table class="table table-striped" style="border:3px solid white;border-radius:30px;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name Of Player</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                   
                </tr>
            </thead>
                
                <?php
               while($row=mysqli_fetch_array($query)){
                   echo "<tbody><tr><td>".$row[0]." ".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr></tbody>";
               }
                ?>
            </table>
            <script src="js/jquery-1.9.1.min.js"></script>
            
            
        </body>
    </html>