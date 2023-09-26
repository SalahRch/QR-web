<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function create(){
        return view('admin.createreport');
    }
    public function charts(){
        return view('admin.charts');
    }
    public function display(){
        $reports = Reports::all();
        return view('admin.reports', compact('reports'));
    }
    public function lastcumulproduction(){
        //get last cumul production
        if(Reports::count() == 0){
            return 1535961.7;
        }
        else {
            $lastcumulproduction = Reports::orderBy('id', 'desc')->first()->cumul_production;
            return $lastcumulproduction;
        }
    }
    public function lastcumulconsomation(){
        //get last cumul production
        if(Reports::count() == 0){
            return 4668946.0;
        }
        else {
            $lastcumulconsomation = Reports::orderBy('id', 'desc')->first()->cumul_consomation;
            return $lastcumulconsomation;
        }
    }
    public function store(Request $request){

        $report = new Reports();
        $report->date = $request->date;
        $report->production = $request->production;
        $report->consomation = $request->consomation;
        //cumul production is the value of the last report cumul production + the current production automatically generated
        $report->cumul_production = round($this->lastcumulproduction() + $request->production,1);
        //cumul consomation is the value of the last report cumul consomation + the current consomation automatically generated
        $report->cumul_consomation = round($this->lastcumulconsomation() + $request->consomation,1);
        $report->consom_elec = round($report->consomation / $report->production, 2);
        $report->notes = $request->notes;
        $report->save();

        return redirect(route('admin.reports'));

    }


}
