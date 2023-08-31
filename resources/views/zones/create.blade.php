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
            </div>
            <div class="form-group">
                <label for="dp">Zone dp</label>
                <input type="file" class="form-control-file" id="dp" name="dp">
            </div>
            <div class="form-group">
                <label for="images">Zone images</label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
            </div>
            <div class="form-group">
                <label for="type">Zone Type</label>
                <select class="form-control" id="type" name="type">
                    <option value="1">Zone</option>
                    <option value="2">Equipement/Sub zone</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>


@endsection
