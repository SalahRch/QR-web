

@extends('layouts.sidebar')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper " style="width: 1300px">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">QR Table</h4>
                            <p class="card-description">
                                Edit<code>Qr data</code>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            Logo
                                        </th>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Creation
                                        </th>
                                        <th>
                                            Edit
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($zones as $zone)
                                        <td class="py-1">
                                            <img src="{{asset('/images/logo/'.$zone->logo)}}" alt="image"/>
                                        </td>
                                        <td>
                                            {{$zone->zone_id}}
                                        </td>
                                        <td>
                                            {{$zone->name}}
                                        </td>
                                        <td>
                                           {{$zone->created_at}}
                                        </td>
                                        <td>
                                            <a href="{{route('zones.edit',$zone->zone_id)}}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
