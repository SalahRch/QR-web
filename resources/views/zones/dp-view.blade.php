

@extends ('layouts.app')



@section('content')
    <div style="text-align:center;">
        <iframe src="{{ asset('dp/'. $zone->dp) }} " width="800" height="500">
        </iframe>
    </div>
    <div style="text-align:center;">

            <a href="/zones/{{$zone->zone_id}}" class="btn btn-primary">view QR</a>
        <a href="{{route('zones.displaypdf')}}" class="btn btn-primary">view more zones</a>
            <a href="/zones/pdf-view/{{$zone->name}}" class="btn btn-primary">view P&ID Diagram</a>

    </div>
@endsection

