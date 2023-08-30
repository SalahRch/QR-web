
@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{route('zones.update',$zone->zone_id)}}" enctype="multipart/form-data" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Zone Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$zone->name}}">
            </div>
            <div class="form-group">
                <label for="description">Zone Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{$zone->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="pdf">Zone pdf</label>
                <input type="file" class="form-control-file" id="pdf" name="pdf">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


@endsection
