<!DOCTYPE html>
<?php
    function playGame($ii) {
        // Stores the set of rolled dice
        $dice = array(); 
        
        // Prints dice on screen
        for($i=0; $i<$ii; $i++) {
            $dieValue = rand(1,6);
            $dice[] = $dieValue;
            echo "<img src=img/die/die$dieValue.png>";
        }  echo "<br>";
        
        // Sorts array
        sort($dice);
        $totalPoints = 0;
        
        //-- Find duplicates 
        //-- and calculates total points
        for($i=0; $i<count($dice); $i++){
            // Sets j to value after i
            $j=$i+1;
            // Checks if next value is duplicate
            if($dice[$i] == $dice[$j]){
                echo "Value $dice[$i] to the power of ";
                $duplicate = 1;
                $value = $dice[$i];
                $points = $value;
                // Counts total duplicates in acending order
                while($dice[$i] == $dice[$j]){
                   $duplicate++;
                   $j++;
               }
               // Calculates points earned
               for($ii = 1; $ii<$duplicate; $ii++){
                   $points = $points*$value;
               }
               // Prints amount of duplicates and points
               $totalPoints += $points;
               echo "$duplicate duplicates equals $points points";
               // Sets i to next unique face value
               $i = $j-1;
               echo "<br>";
            }
        }
        
        // Prints total points
        echo "You scored $totalPoints total points!";
    }
?>

<html>
    <head>
        <title>Dice Game</title>
        <meta charset="utf-8"/>
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    
    <body>
        <header>
            <h1>Dice Game</h1>
        </header>
        <main>
            <br/><br />
        <?php
            if(!isset($_GET['number'])){
                echo "<h2> Enter the number of dice you would like to roll. </h2>";
            } else {
                playGame($_GET['number']);
            }
        ?>
        <br/><br />
        <form>
            <input type="text" name="number" placeholder="      Num of Dice" value="<?=$GET_['number']?>"/>
            <input type="submit" value ="Reroll!"/>
        </form>
        </main>
    </body>
    <footer>
            <figure id ="otter">
                <img src="img/otter.png">
            </figure>
            <hr>
            <p>CST336 Internet Progrmming 2017 &copy; Mijangos</p>
        </footer>
</html>