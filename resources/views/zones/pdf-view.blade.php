

@extends ('layouts.app')



@section('content')
    <div style="text-align:center;">
        <iframe src="{{ asset('pdf/'. $zone->pdf) }} " width="800" height="500">
        </iframe>
    </div>
    <div style="text-align:center;">
        @if(Auth::user()->role == 'admin')
            <a href="/zones/{{$zone->zone_id}}" class="btn btn-primary">view QR</a>
            <a href="/zones" class="btn btn-primary">view more zones</a>
        @else
    <a href="/zones" class="btn btn-primary">view more zones</a>
        @endif
    </div>
@endsection

