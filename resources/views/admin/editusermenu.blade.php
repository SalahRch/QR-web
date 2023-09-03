@extends('layouts.sidebar')

@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Users table</h4>
                <p class="card-description">
                    Edit<code>Users data</code>
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Role
                            </th>
                            <th>
                                Creation
                            </th>
                            <th>
                                Update
                            </th>
                            <th>
                                Edit
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                {{$user->id}}
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{$user->role}}
                            </td>
                            <td>
                                {{$user->created_at}}
                            </td>
                            <td>
                                {{$user->updated_at}}
                            </td>
                            <td>
                                <a href="{{route('zones.editsolo',$user->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
