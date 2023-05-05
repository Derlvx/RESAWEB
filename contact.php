<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <div class="nav-wrapper">
        <nav class="navbar">
            <a href="index.php"><img class="brandLogo" src="ICONES/NIGHT/LOGO.svg" alt="Company Logo">
            </a>

            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <ul class="nav no-search">
                <li class="nav-item"><a href="index.php#aboutUs">Overview</a></li>
                <li class="nav-item"><a href="#">About us</a></li>
                <li class="nav-item"><a href="catalog.php">Our product</a></li>
                <li class="nav-item"><a href="extra.php">Extra</a></li>
            </ul>
        </nav>
    </div>

    <form action="insert_contact.php" method="POST">
        <section class="contactForm">
            <div class="formBackground">
                <h3>Contact Us</h3>
                <div class="container contact-column">
                    <div class="formLine">
                        <div class="form-control">
                            <input type="text" name="first-name" class="form-input" placeholder="none" required>
                            <label for="first-name" class="form-label">First Name<sup class="supRequired">*</sup></label>
                        </div>
                        <div class="form-control">
                            <input type="text" name="last-name" class="form-input" placeholder="none" required>
                            <label for="last-name" class="form-label">Last Name<sup class="supRequired">*</sup></label>
                        </div>
                    </div>
                    <div class="form-control">
                        <input type="email" name="email" class="form-input" placeholder="none" required>
                        <label for="email" class="form-label">Email<sup class="supRequired">*</sup></label>
                    </div>
                    <div class="form-control">
                        <input type="text" name="issue" class="form-input" placeholder="none" required>
                        <label for="issue" class="form-label">Your Issue<sup class="supRequired">*</sup></label>
                    </div>
                    <button class="full-rounded">
                        <div class="svg-wrapper-1">
                            <div class="svg-wrapper">
                                <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="currentColor"></path>
                                </svg>
                            </div>
                        </div>
                        <span>Send</span>
                    </button>
                    <p class="calloutSubtext">Required Informations<sup class="supRequired">*</sup></p>
                </div>
            </div>
        </section>
    </form>
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
            <a href="">Contact us</a>
        </p>

    </footer>
</body>

</html>