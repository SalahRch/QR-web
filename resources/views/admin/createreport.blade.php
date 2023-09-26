@extends('layouts.sidebar')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper" style="width: 1300px">
            <div class="row"  >
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Report creation:</h4>
                            <p class="card-description">
                                Create new Report :
                            </p>
                            <form class="forms-sample" action="/reports" enctype="multipart/form-data" method="POST">
                                @csrf
                                <!--add a label for a date-->
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" name="date" id="date" placeholder="date">
                                </div>
                                <div class="form-group">
                                    <label for="production">Production M3 (24h)</label>
                                    <input type="number" step="any" class="form-control" name="production" id="production" placeholder="production">
                                </div>
                                <div class="form-group">
                                    <label for="consomation">Consomation Energie KW (24h)</label>
                                    <input type="number" step="any" class="form-control" name="consomation" id="consomation" placeholder="consomation">
                                </div>
                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea class="form-control" name="notes" id="notes" rows="4"></textarea>
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
