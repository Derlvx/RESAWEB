<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="leaflet-search.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <title>Horizon</title>
</head>

<body>
    <div class="nav-wrapper">
        <nav class="navbar">
            <a href="index.html"><img class="brandLogo" src="ICONES/NIGHT/LOGO.svg" alt="Company Logo">
            </a>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <ul class="nav no-search">
                <li class="nav-item"><a href="index.html#aboutUs">Overview</a></li>
                <li class="nav-item"><a href="#">About us</a></li>
                <li class="nav-item"><a href="catalog.html">Our product</a></li>
                <li class="nav-item"><a href="extra.php">Extra</a></li>
            </ul>
        </nav>
    </div>

    <form action="">

        <section class="cartContainer">

            <div class="mapViewer">
                <div class="mapBackground">
                    <section class="mapContainer">
                        <h3>CHOOSE A LOCATION</h3>
                        <div id="map"></div>
                    </section>
                </div>
            </div>

            <div class="guestViewer hide">
                <div class="guestBackground">
                    <h3>CHOOSE NUMBER OF GUEST</h3>
                    <div class="offerContainer">
                        <div class="guestCard">
                            <img src="ICONES/NIGHT/one.svg" alt="">
                            <div class="offerContent">
                                <h3>4 guests</h3>
                                <p>200$ <span>/ day</span></p>
                            </div>
                            <div class="selectButton guestButton">
                                <input class="radio" type="radio" name="number" id="radio2-1" value="4" onclick="selectGuest()" required>
                                <label for="radio2-1">select</label>
                                <div class="border full-rounded"></div>
                            </div>
                        </div>
                        <div class="guestCard">
                            <img src="ICONES/NIGHT/two.svg" alt="">
                            <div class="offerContent">
                                <h3>4 guests</h3>
                                <p>200$ <span>/ day</span></p>
                            </div>
                            <div class="selectButton guestButton">
                                <input class="radio" type="radio" name="number" id="radio2-2" value="6" onclick="selectGuest()" required>
                                <label for="radio2-2">select</label>
                                <div class="border full-rounded"></div>
                            </div>
                        </div>
                        <div class="guestCard">
                            <img src="ICONES/NIGHT/three.svg" alt="">
                            <div class="offerContent">
                                <h3>8 guests</h3>
                                <p>600$ <span>/ day</span></p>
                            </div>
                            <div class="selectButton guestButton">
                                <input class="radio" type="radio" name="number" id="radio2-3" value="8" onclick="selectGuest()" required>
                                <label for="radio2-3">select</label>
                                <div class="border full-rounded"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formViewer hide">
                <div class="formBackground">
                    <h3>Book a room</h3>
                    <div class="container contact-column">
                        <form name="contact" class="contact-inform form">
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
                            <div class="formLine">
                                <div class="form-control">
                                    <input type="date" name="start-date" class="form-input" placeholder="none" required>
                                    <label for="start-date" class="form-label">Start Date<sup class="supRequired">*</sup></label>
                                </div>
                                <div class="form-control">
                                    <input type="date" name="end-date" class="form-input" placeholder="none" required>
                                    <label for="end-date" class="form-label">End Date<sup class="supRequired">*</sup></label>
                                </div>
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
                        </form>
                    </div>
                </div>
            </div>
            <li class="checkoutBar">
                <button id="dots1" disabled="true">
                    <ul class="progressDots">
                        <div id="dotsActive1" class="dotsActive show"></div>
                    </ul>
                </button>
                <button id="dots2" disabled="true">
                    <ul class="progressDots">
                        <div id="dotsActive2" class="dotsActive hide"></div>
                    </ul>
                </button>
                <button id="dots3" disabled="true">
                    <ul class="progressDots">
                        <div id="dotsActive3" class="dotsActive hide" disabled></div>
                    </ul>
                </button>
            </li>
        </section>
    </form>

    <footer>

        <p>
            <a href="">Terms</a>
        </p>
        <p>
            <a href="">Privacy</a>
        </p>

        <div class="bottomBrandLogo">
            <a href="index.html"><img src="ICONES/NIGHT/LOGO.svg" alt="Go Top"></a>
        </div>

        <p>
            <a href="FAQ.html">FAQ</a>
        </p>
        <p>
            <a href="index.html">Contact us</a>
        </p>

    </footer>
</body>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="JS/map.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script defer type="text/javascript" src="JS/script.js"></script>

<script>
    var maplocation = 0;

    function selectMap(maplocation) {
        document.querySelector(".mapViewer").classList.add("hide");
        document.querySelector(".mapViewer").classList.remove("show");

        document.querySelector(".guestViewer").classList.add("show");
        document.querySelector(".guestViewer").classList.remove("hide");

        document.querySelector("#dotsActive1").classList.add("hide");
        document.querySelector("#dotsActive1").classList.remove("show");

        document.querySelector("#dotsActive2").classList.add("show");
        document.querySelector("#dotsActive2").classList.remove("hide");

        document.getElementById("dots1").removeAttribute('disabled');
    }

    function selectGuest(maplocation) {
        document.querySelector(".guestViewer").classList.add("hide");
        document.querySelector(".guestViewer").classList.remove("show");

        document.querySelector(".formViewer").classList.add("show");
        document.querySelector(".formViewer").classList.remove("hide");

        document.querySelector("#dotsActive2").classList.add("hide");
        document.querySelector("#dotsActive2").classList.remove("show");

        document.querySelector("#dotsActive3").classList.add("show");
        document.querySelector("#dotsActive3").classList.remove("hide");
        document.getElementById("dots2").removeAttribute('disabled');
    }
</script>

</html>