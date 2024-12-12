<!DOCTYPE html>
<html lang="en">
<head>
    <style>
body {
    font-family: Arial, sans-serif;
    background-image: url('images/yellowbg1.png');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column; /* Stack elements vertically */
    align-items: center; /* Center content horizontally */
    justify-content: start;
    height: 100vh;
    margin: 0;
}

.img {
    margin-top: 10px; /* Adjust the space from the top */
    height: auto; /* Maintain the aspect ratio of the logo */
}


.container {
    height: 10px;
    font-size: 30px;
    color: #fff;
    font-family: 'Arial';
    font-weight: 300;
    margin-top: -40px; /* Adjust space between elements */
}
.name {
    height: 80px;
    font-size: 50px;
    color: #ed7117;
    font-family: 'Impact';
    font-weight: 300;
    margin-top: 20px; /* Adjust space between elements */
    text-shadow: 2px 2px 4px rgba(255, 215, 0, 0.8), -2px -2px 4px rgba(255, 215, 0, 0.8), 
                 2px -2px 4px rgba(255, 215, 0, 0.8), -2px 2px 4px rgba(255, 215, 0, 0.8);
}

.ems {
    height: 10px;
    font-size: 15px;
    color: #fff;
    font-family: 'Arial';
    font-weight: 300;
    margin-top: 70px; /* Adjust space between elements */
    letter-spacing: 2px; /* Increase the space between letters */
}

.ems a {
    height: 10px;
    font-size: 8px;
    color: #fff;
    font-family: 'Arial';
    font-weight: 300;
}
.sms {
    height: 10px;
    font-size: 14px;
    color: beige;
    font-family: 'Arial';
    font-weight: 300;
    margin-top: 20px;

}

button {
    margin-top: 120px;
    margin-bottom: 10px;
    width: 10%;
    padding: 10px;
    background-color: #e47200;
    border: none;
    border-radius: 20px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #e6b400;
}

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="img">
    <img src="images/landlogo.png" alt="Bounty Coders Logo">
</div>

<div class="container">
    <h1>WELCOME TO</h1>
</div>

<div class="name">
    <h1>BOUNTY CODERS</h1>
</div>

<div class="ems">
    <h1>Event Management System</h1>
    </div>

    <button type="button" onclick="window.location.href='events.php';">Proceed</button>


    <div class="ems a">
        <h4>💪 Fitness Events   |   🎮 Esports Tournaments   |   🏀 Sports Competitions</h4>
        </div>


    <div class="sms">
        <p><i>Never miss a fitness, esports, or sports activity. Stay updated and make the most of your Bounty Coders experience!</p>
        </i></p>
    </div>



</body>
</html>
