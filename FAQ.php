<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Horizon</title>
</head>

<body>
    <div class="nav-wrapper">
        <nav class="navbar">
            <a data-aos="fade-down" data-aos-duration="750" href="index.php"><img class="brandLogo" src="ICONES/NIGHT/LOGO.svg" alt="Company Logo">
            </a>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <ul class="nav no-search">
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="100" class="nav-item"><a href="index.php#aboutUs">Overview</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="200" class="nav-item"><a href="aboutus.php">About us</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="300" class="nav-item"><a href="catalog.php">Our product</a></li>
                <li data-aos="fade-down" data-aos-duration="750" data-aos-delay="400" class="nav-item"><a href="extra.php">Extra</a></li>
            </ul>
        </nav>
    </div>

    <section class="faq">
        <!-- <div class="navbarSpace"></div> -->
        <h2>FAQ</h2>
        <div class="questions">
            <button class="accordion">How do I make a reservation for a gaming room ?</button>
            <div class="panel">
                <p> To make a reservation for a gaming room, simply visit our website and select the gaming room you would like to reserve. You will then be prompted to choose the date you would like to reserve and provide information.</p>
            </div>
        </div>

        <div class="questions">
            <button class="accordion">What types of gaming rooms are available for reservation ?</button>
            <div class="panel">
                <p> We offer a variety of gaming rooms to choose from, including rooms equipped with consoles, PCs, and virtual reality systems. Each room is designed to provide a unique gaming experience.</p>
            </div>
        </div>

        <div class="questions">
            <button class="accordion">Can I bring my own gaming equipment to the room ?</button>
            <div class="panel">
                <p>Yes, you are welcome to bring your own gaming equipment to the room. However, please note that we are not responsible for any damage or loss of personal equipment.</p>
            </div>
        </div>

        <div class="questions">
            <button class="accordion">Is there a time limit for how long I can reserve a gaming room ?</button>
            <div class="panel">
                <p>The length of time you can reserve a gaming room varies depending on the room you choose and availability. Most rooms can be reserved for a minimum of one day.</p>
            </div>
        </div>

        <div class="questions">
            <button class="accordion">What is the cancellation policy for gaming room reservations ?</button>
            <div class="panel">
                <p>Our cancellation policy allows for a full refund if you cancel your reservation at least 24 hours in advance. If you cancel within 24 hours of your reservation, you will be charged a cancellation fee. Please refer to our website for more information on our cancellation policy.</p>
            </div>
        </div>

    </section>

    <footer>

        <p>
            <a href="terms.php">Terms</a>
        </p>
        <p>
            <a href="privacy.php">Privacy</a>
        </p>

        <div class="bottomBrandLogo">
            <a href="index.php"><img src="ICONES/NIGHT/LOGO.svg" alt="Go Top"></a>
        </div>

        <p>
            <a href="FAQ.php">FAQ</a>
        </p>
        <p>
            <a href="contact.php">Contact us</a>
        </p>

    </footer>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script defer type="text/javascript" src="JS/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>