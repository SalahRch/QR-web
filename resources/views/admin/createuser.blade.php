@extends('layouts.sidebar')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper" style="width: 1300px">
            <div class="row"  >
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">User creation:</h4>
                            <p class="card-description">
                                Create new user :
                            </p>
                            <form class="forms-sample" action="/users" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="form-group ">
                                    <label for="password" >Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <div class="input-group col-xs-12">
                                        <select class="custom-select" id="role" name="role">
                                            <option selected>Select...</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
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
