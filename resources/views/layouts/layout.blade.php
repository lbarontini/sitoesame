<!DOCTYPE html>
<html lang="en">

<head>
    <title>HTML5 Goodness</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <link href="/css/styles.css" rel="stylesheet" type="text/css" media="all">
    <link href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Vollkorn:regular,italic,bold" rel="stylesheet" type="text/css">

    @yield('script')
</head>
<body>
    <div id="headerwrap">
        <header id="mainheader" class="bodywidth clear"> <img src= "{{asset('images/logo.png')}}" alt="" class="logo">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <hgroup id="websitetitle">
                <h1><span class="bold">HTML5</span>Goodness</h1>
                <h2>about as modern as it gets...</h2>
            </hgroup>
            <nav>
                <ul>
                    <li><a class="{{Request::path() === '/' ? 'highlighted' : ''}}" href="/">Home</a></li>
                    <li><a class="{{Request::path() === 'products' ? 'highlighted' : ''}}" href="{{route('products.index')}}">Prodotti</a></li>
                    <li><a class="{{Request::path() === 'assistance_centers' ? 'highlighted' : ''}}" href="{{route('assistance_centers.index')}}">Centri assistenza </a></li>
                    <li><a class="{{Request::path() === 'faqs' ? 'highlighted' : ''}}" href="/faqs">F.A.Q.</a></li>
                    <li><a class="{{Request::path() === 'login' ? 'highlighted' : (Request::path() === 'login_home' ? 'highlighted' : '')}}" href="/login_home">Login</a></li>
                    @can('staff_work')
                        <li><a class="{{Request::path() === 'administration' ? 'highlighted' : ''}}" href="{{route('administration')}}">Gestione</a></li>
                    @endcan
                </ul>
            </nav>
        </header>
    </div>

    @yield('content')

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
