<!-- create a page where a all the pdfs links are displayed and can be downloaded and add a searchbar to search for a specific pdf -->

@extends('layouts.app')

@section('content')

    <div class="container">
        <!--navbar and above put search bar -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div>
                        <h1>Display PDFs</h1>
                    </div>
                    <!-- place a search bar in right side of page -->

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>P&ID</th>
                                <th>DF</th>
                                <th>Other</th>
                                <th>Download</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($zones as $zone)
                                <tr>
                                    <td>{{$zone->name}}</td>
                                    @if ($zone->pdf == null)
                                        <td><em style="color: lightgrey">Not Available</em></td>
                                    @else
                                        <td><a href="/zones/pdf-view/{{$zone->name}}">View</a></td>
                                    @endif
                                    @if ($zone->dp == null)
                                        <td><em style="color: lightgrey">Not Available</em></td>
                                    @else
                                        <td><a href="/zones/dp-view/{{$zone->name}}">View</a></td>
                                    @endif
                                    @if ($zone->other == null)
                                        <td><em style="color: lightgrey">Not Available</em></td>
                                    @else
                                        <td><a href="/zones/other-view/{{$zone->name}}">View</a></td>
                                    @endif
                                    <td><a href="{{route('zones.download',$zone->zone_id)}}">Download</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            <a href="/zones/displaypdf" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


