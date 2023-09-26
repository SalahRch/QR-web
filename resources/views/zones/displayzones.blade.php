<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive 3D Cards</title>

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-cards.css') }}" rel="stylesheet">
    <style>
        body {
            background-image: url("{{asset('astral/css/images/bg.jpg')}}");
            background-repeat: repeat, no-repeat;
            background-size: auto, 100% 100%;
            background-attachment: fixed;
            overflow-y: scroll;
        }
    </style>
</head>
<body>
<section>
    @foreach($zones as $zone)
    <div class="container">
        <div class="card">
            <div class="front">
                <div class="content">
                    <img src="/images/logo/{{$zone->logo}}" />
                    <h3>{{$zone->name}}</h3>
                </div>
            </div>
            <div class="back">
                <div class="content">
                    <a href="/zones/{{$zone->zone_id}}">
                    <button type="button" class="btn btn-primary">P&ID</button>
                    </a>
                    <a href="/zones/dp/{{$zone->zone_id}}">
                    <button type="button" class="btn btn-primary">DP</button>
                    </a>
                    @if ($zone->type == 2)
                        <a href="/zones/other/{{$zone->zone_id}}">
                            <button type="button" class="btn btn-primary">Other</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach

</section>
</body>
</html>
