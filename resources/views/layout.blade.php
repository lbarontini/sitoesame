<!DOCTYPE html>
<html lang="en">
<head>
    <title>HTML5 Goodness</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="all">
    <link href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Vollkorn:regular,italic,bold" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <script src="js/IE9.js"></script>
    <![endif]-->
</head>
<body>
    <div id="headerwrap">
        <header id="mainheader" class="bodywidth clear"> <img src="images/logo.png" alt="" class="logo">
            <hgroup id="websitetitle">
                <h1><span class="bold">HTML5</span>Goodness</h1>
                <h2>about as modern as it gets...</h2>
            </hgroup>
            <nav>
                <ul>
                    <li><a class="highlighted" href="/" >Home</a></li>
                    <li><a href="catalog">Catalogo</a></li>
                    <li><a href="#">Centri assistenza </a></li>
                    <li><a href="#">F.A.Q.</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <aside id="introduction" class="bodywidth clear">
        <div id="introleft">
            <h2>Welcome to <span class="blue">our website</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis molestie sapien. Proin elit quam, commodo ut aliquet vel, elementum ut odio. Praesent semper tincidunt magna, sed sagittis elit congue sed. Mauris malesuada, elit ut luctus tristique, lectus libero rutrum mauris, ac tristique.</p>
            <p><a href="#" class="findoutmore">Find out more?</a></p>
        </div>
        <blockquote id="introquote">
            <p>This company is amazing. I can't come up with enough good things to say. Literally. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum magna tortor.</p>
            <p class="quotename">John Smith, <span class="bold">Another Company</span></p>
        </blockquote>
    </aside>

    <div id="maincontent" class="bodywidth clear">
        @yield('maincontent')
    </div>
    <div id="footerwrap">
    <footer id="mainfooter" class="bodywidth clear">
        <nav class="clear">
        <ul>
            <li><a href="#">Homepage</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Resources</a></li>
            <li><a href="#">Sitemap</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        </nav>
        <p class="copyright">Website Template By <a target="_blank" href="http://www.tristarwebdesign.co.uk/">Tristar</a> &amp; Modified By <a target="_blank" href="http://www.os-templates.com/">OS Templates</a></p>
    </footer>
    </div>
</body>
</html>
