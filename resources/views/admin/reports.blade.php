@extends('layouts.sidebar')

@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Reports table</h4>
                <p class="card-description">
                    View<code>Reports data</code>
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="font-size: x-small">
                                Date
                            </th>
                            <th style="font-size: x-small">
                                cumul Production depuis
                                le 11/04/2023
                            </th>
                            <th style="font-size: x-small">
                                cumul cons Enérgie éléctrique depuis
                                le 11/04/2023
                            </th>
                            <th style="font-size: x-small">
                                Production M3
                                (24h)
                            </th>
                            <th style="font-size: x-small">
                                Consomation Energie KW
                                (24h)
                            </th>
                            <th style="font-size: x-small">
                                Consommation d'énérgie Eléctrique
                                (KW/m3)
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td>
                                    {{$report->date}}
                                </td>
                                <td>
                                    {{$report->cumul_production}}
                                </td>
                                <td>
                                    {{$report->cumul_consomation}}
                                </td>
                                <td>
                                    {{$report->production}}
                                </td>
                                <td>
                                    {{$report->consomation}}
                                </td>
                                <td>
                                    {{$report->consom_elec}}
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
