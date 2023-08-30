@extends('layouts.app')

@section('content')



    <div class="container">
        <form action="/zones" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Zone Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Zone Name">
            </div>
            <div class="form-group">
                <label for="description">Zone Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
             <div class="form-group">
                <label for="pdf">Zone pdf</label>
                <input type="file" class="form-control-file" id="pdf" name="pdf">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>


@endsection
