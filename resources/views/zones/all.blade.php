

<!DOCTYPE HTML>

<html>

<head>
    <title>Zones</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="{{ asset('astral/css/main.css') }}" rel="stylesheet">
    <noscript><link rel="stylesheet" href="{{ asset('astral/css/noscript.css') }}" /></noscript>
</head>

<body class="is-preload">

<!-- Wrapper-->
<div id="wrapper">

    <!-- Nav -->
    <nav id="nav">
        <a href="#" class="icon solid fa-globe"><span>Zones</span></a>
        <a href="#home2" class="icon solid fa-toolbox"><span>Autres</span></a>
    </nav>

    <!-- Main -->
    <div id="main">

        <!-- Me -->
        <article id="home" class="panel intro">
            <header>
                <h1>Zones</h1>
                <p>Display zones</p>
                <a href="{{route('zones.displayzones',$type=1)}}">
                    <span class="icon solid fa-link"></span>
                </a>
            </header>
            <a href="#home2" class="jumplink pic">
                <span class="arrow icon solid fa-chevron-right"><span>See my work</span></span>
                <img src="{{asset('astral/css/images/OIP.jpeg')}}" alt="" />
            </a>
        </article>

        <!-- Work -->
        <article id="home2" class="panel intro">
            <header>
                <h1>Equipements / Subzones</h1>
                <p>Display Equipements / Subzones</p>
                <a href="{{route('zones.displayzones',$type=2)}}">
                    <span class="icon solid fa-link"></span>
                </a>
            </header>
            <a href="#home" class="jumplink pic">
                <span class="arrow icon solid fa-chevron-left"><span>See my work</span></span>
                <img src="{{asset('astral/css/images/RIP.jpg')}}" alt="" />
            </a>
        </article>



    </div>

    <!-- Footer -->
    <div id="footer">
        <ul class="copyright">
            <li>&copy; OCP.</li><li>Design: OCP</li>
        </ul>
    </div>

</div>

<!-- Scripts -->

<script src="{{ asset('astral/js/jquery.min.js') }}"></script>
<script src="{{ asset('astral/js/browser.min.js') }}"></script>
<script src="{{ asset('astral/js/breakpoints.min.js') }}"></script>
<script src="{{ asset('astral/js/util.js') }}"></script>
<script src="{{ asset('astral/js/main.js') }}"></script>


</body>
</html>
