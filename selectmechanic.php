<?php

require_once('DBconnect.php');
$query="select name, rating, carcount, id from mechanic";
$result= mysqli_query($conn,$query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="selectmechanic.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <ul>
            <li ><a class="underline" href="homepage.html">Home</a></li>
            <li ><a class="underline" href="homepage.html">Home</a></li>
            <li ><a class="underline" href="homepage.html">Home</a></li>
        </ul>
    </nav>
    
    <form >
        <table class="tableclass">
            <h1>Select Your Mechanic</h1>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player class="animation" src="https://assets1.lottiefiles.com/packages/lf20_ut4qb3nj.json"  background="transparent"  speed="1"  align="center" style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                <tr>
                    <th>Name</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Book</th>
                </tr>
                <tr>
                <?php
                    while ($row = mysqli_fetch_assoc($result))
                    {


                        
                        ?>

                        <td><?php echo $row['name'];?></td>
                        <?php
                        if($row['rating']==="5"){
                            ?>
                            <td>
                                <div class="rate">
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                </div>
                            </td>
                            <?php
                        }
                        elseif($row['rating']==="4")
                        {
                            ?>
                            <td>
                                <div class="rate">
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                    <div class="circle"></div>

                                </div>
                            </td> 
                            <?php
                        }
                        elseif($row['rating']==="3")
                        {
                            ?>
                            <td>
                                <div class="rate">
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                </div>
                            </td> 
                            <?php
                        }
                        ?>
                            <?php                    
                            if($row['carcount']==3){
                            ?>
                            <td id="status">Unavailable</td>
                        <?php
                        
                        }
                        else{
                            ?>
                            <td id="status">Available</td>
                                <?php
                        }
                        ?>
                        <?php                    

?>
                    </tr>
                    <?php
                    }?>
        </table>
        <form>

</body>
</html>

