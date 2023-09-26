@extends('layouts.sidebar')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper" style="width: 1300px">
         <div class="row"  >
            <div class="col-12 grid-margin stretch-card">
               <div class="card">
               <div class="card-body">
                  <h4 class="card-title">QR creation:</h4>
                <p class="card-description">
                    Create new element :
                </p>
                <form class="forms-sample" action="/zones" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <div class="input-group">
                            <input type="file" class="custom-file-input" name="logo" id="logo">
                            <label class="custom-file-label" for="logo">Choose image</label>
                        </div>
                    </div>
                        <div class="form-group">
                            <label>Type *</label>
                            <div class="input-group col-xs-12">
                            <select class="custom-select" id="type" name="type">
                                <option selected value="">Select...</option>
                                <option value="1">Zone</option>
                                <option value="2">Equipement/Subzone</option>
                            </select>
                            </div>
                            @error('type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="form-group">
                        <label>P&ID upload</label>
                        <div class="input-group">
                            <input type="file" class="custom-file-input" name="pdf" id="pdf">
                            <label class="custom-file-label" for="pdf">Choose pdf</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>DP upload</label>
                        <div class="input-group">
                            <input type="file" class="custom-file-input" name="dp" id="dp">
                            <label class="custom-file-label" for="dp">Choose pdf</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Other PDF upload</label>
                        <div class="input-group">
                            <input type="file" class="custom-file-input" name="other" id="other">
                            <label class="custom-file-label" for="other">Choose pdf</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image upload</label>
                        <div class="input-group">
                            <input type="file" class="custom-file-input" name="images" id="images">
                            <label class="custom-file-label" for="images">Choose image</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
          </div>
               </div>
            </div>
         </div>
        </div>
    </div>



@endsection
