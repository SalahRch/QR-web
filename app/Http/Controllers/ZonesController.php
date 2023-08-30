<?php

namespace App\Http\Controllers;


use App\Models\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class ZonesController extends Controller
{

    public function index($zoneid)
    {
        $zone = Zones::find($zoneid);
        return view('zones.index', compact('zone'));
    }

    public function edit($zoneid){

        $zone = Zones::find($zoneid);
        return view('zones.edit',compact('zone'));

    }
    public function delete($zoneid){

        $zone = Zones::find($zoneid);
        $zone->delete();

        unlink(public_path('pdf/'.$zone->pdf));
        unlink(public_path('qrcodes/'.$zone->name.'.svg'));

        return redirect('/home');
    }

    public function create()
    {
        return view('zones.create');
    }
    public function showPDFView($name)
    {
        $zone = Zones::where('name', $name)->first();
        return view('zones.pdf-view', compact('zone'));
    }

    public function store(){
/*
         $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'pdf' => 'required',
            'qr_code' => '',
        ]);
*/

        $zone = new Zones();
        $zone->name = request('name');
        $zone->description = request('description');
        $zone->

        //import pdf file to public folder
        $file = request()->file('pdf');
        $file->move(public_path('pdf'), $file->getClientOriginalName());
        $zone->pdf = $file->getClientOriginalName();

        $path = route('pdf-view-route', $zone->name);

        $zone->qr_code = QrCode::size(500)->generate($path , public_path('qrcodes/'.$zone->name.'.svg'));

        $zone->save();

    }
    public function update($zoneid){

        $zone = Zones::find($zoneid);
        $zone->name = request('name');
        $zone->description = request('description');

        //if pdf file imported update it
        if(request()->file('pdf')){
            $file = request()->file('pdf');
            $file->move(public_path('pdf'), $file->getClientOriginalName());
            $zone->pdf = $file->getClientOriginalName();
        }

        $path = route('pdf-view-route', $zone->name);

        $zone->qr_code = QrCode::size(500)->generate($path , public_path('qrcodes/'.$zone->name.'.svg'));

        $zone->save();

    }
}
