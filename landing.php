<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/yellowbg3.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between; /* Space out content and footer */
            gap: 10px;
            height: 100vh;
            margin: 0;
            padding: 0 10px;
        }

        .img img {
            margin-top: 0;
            max-width: 80%;
            height: auto;
        }

        .container {
            font-size: 2rem;
            color: #fff;
            font-family: 'Arial';
            font-weight: 300;
            text-align: center;
            margin: 0;
        }

        .name {
            font-size: 4rem;
            color: #ed7117;
            font-family: 'Impact';
            font-weight: 300;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(255, 215, 0, 0.8);
            margin: 0;
        }

        h1{
            margin-top: 0px;
        }
         h2 {
            margin: 0;
        }

        button {
            width: 120px;
            padding: 10px;
            background-color: #e47200;
            border: none;
            border-radius: 20px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 0px;
        }

        button:hover {
            background-color: #e6b400;
        }

        footer {
            text-align: center;
            background-color: #e6a421;
            padding: 10px;
            width: 100%;
            color: #fff;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            gap: 5px;
            align-items: center;
        }

        .footer-content p {
            margin: 0;
            font-size: 12px;
            letter-spacing: 1px;
        }

        .footer-content h4 {
            margin: 0;
            font-weight: 300;
            color: beige;
        }

        @media (max-width: 768px) {
            .container, .name {
                font-size: smaller;
            }

            button {
                width: 70%;
                font-size: 0.9rem;
            }

            .img img {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="img">
        <img src="images/landlogo.png" alt="Bounty Coders Logo">
    </div>

    <div class="container">
        <h2>WELCOME TO</h2>
    </div>

    <div class="name">
        <h1>BOUNTY CODERS</h1>
    </div>

    <button type="button" onclick="window.location.href='events.php';">Proceed</button>

    <!-- Footer moved inside the body -->
    <footer>
        <div class="footer-content">
            <h3><strong>💪 Fitness Events | 🎮 Esports Tournaments | 🏀 Sports Competitions</strong></h3>
            <h4><i>Never miss a fitness, esports, or sports activity. Stay updated and make the most of your Bounty Coders experience!</i></h4>
        </div>
    </footer>
</body>
</html>
