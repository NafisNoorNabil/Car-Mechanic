
<?php

require_once('DBconnect.php');
$query="select name, rating, carcount,maxcar, id from mechanic";
$result= mysqli_query($conn,$query);
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--<title> Registration or Sign Up form in HTML CSS | CodingLab </title>-->
        <link rel="stylesheet" href="home.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
        <nav class="nav">
            <ul>
                <li ><a class="underline" href="homepage.html">Home</a></li>
                <li ><a class="underline" href="homepage.html">Book</a></li>
                <li ><a class="underline" href="homepage.html">Mechanics</a></li>
            </ul>
        </nav>
    </head>
    <body>
        <div class="intro">
            <div>
                <h1> Want To Fix Your Car?</h1>
                <h2>Book A Mechanic Now</h2>
                <a href="#">BOOK</a>
            </div>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_cbemdbsc.json"  background="transparent"  speed="1"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>
        </div>
        <div class="images">
            <img src="mecpic1.webp" height="400px" width="600px" >
            <img src="mecpic2.jpg" height="400px" width="600px" >
            <img src="mecpic3.jpg" height="400px" width="600px" >
        </div>

        <form >
        <table class="tableclass">
            
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player class="animation" src="https://assets1.lottiefiles.com/packages/lf20_ut4qb3nj.json"  background="transparent"  speed="1"  align="center" style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
            <h1 class="mechhead">Our Mechanics</h1>
            <tr>
                    <th>Name</th>
                    <th>Rating</th>
                    <th>Status</th>
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
                            if($row['carcount']==$row['maxcar']){
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
                </form>

            <?php
            $query="select name, rating, carcount, id from mechanic";
            $result= mysqli_query($conn,$query);
            ?>


        <div class="formdesign">
        <div class="wrapper">
            <h2>Booking</h2>
            <form action="homedata.php" method="POST">
                <div class="input-box">
                    <input type="text" placeholder="Enter your name" name="name" required />
                </div>
                <div class="input-box">
                    <input
                        type="text"
                        placeholder="Car License Number"
						name="license"
                        required
                    />
                </div>
                <div class="input-box">
                    <input
                        type="text"
                        placeholder="Car Color"
						name="carcolor"
                        required
                    />
                </div>
                <div class="input-box">
                    <input
                        type="text"
                        placeholder="Car Engine Number"
						name="engine"
                        required
                    />
                </div>
                <div class="input-box">
                    <input
                        type="phone"
                        placeholder="Phone Number"
						name="phone"
                        required
                    />
                </div>
                <div class="input-box">
                    <input
                        type="date"
                        placeholder="Date"
						name="date"
                        required
                    />
                </div>
                <div class="input-box">
                    <label for="mechanic">Choose Your Mechanic:</label>
                    <select class="select" type="text" name="mechanicname">
                    <?php
                                    while ($row = mysqli_fetch_assoc($result))
                                    {
                                        if($row['carcount']<3){?>
                                            <option class="option"><?php echo $row['name'];?></option>
                                        <?php
                                        }
                                    }?>
                                    </select>

                </div>
                <div class="input-box button">
                    <input id="button" type="Submit" name="submit" value="Book" />
                </div>

                
        

            </form>
        
        
        </div>
    </div>



    </body>
</html>
