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
        unlink(public_path('qrcodesPID/'.$zone->name.'.svg'));
        unlink(public_path('images/internimages/'.$zone->images));
        unlink(public_path('qrcodesDP/'.$zone->name.'.svg'));

        return redirect('/home');
    }

    public function create()
    {
        return view('zones.create');
    }
    public function all()
    {
        return view('zones.all');
    }

    public function showPDFView($name)
    {
        $zone = Zones::where('name', $name)->first();
        return view('zones.pdf-view', compact('zone'));
    }
    public function showDPView($name)
    {
        $zone = Zones::where('name', $name)->first();
        return view('zones.dp-view', compact('zone'));
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
        $zone->type = request('type');

if(request()->file('images')){
        $image = request()->file('images');
        $imageName = $image[0]->getClientOriginalName();
        $image[0]->move(public_path('images/internimages'), $imageName);
        $zone->images = $imageName;
}

if(request()->file('dp')){
        $dp= request()->file('dp');
        $dp->move(public_path('dp'), $dp->getClientOriginalName());
        $zone->dp = $dp->getClientOriginalName();

        $path = route('dp-view-route', $zone->name);
        $zone->qr_codeDP = QrCode::size(500)->generate($path , public_path('qrcodesDP/'.$zone->name.'.svg'));
}

if (request()->file('pdf')) {
    $file = request()->file('pdf');
    $file->move(public_path('pdf'), $file->getClientOriginalName());
    $zone->pdf = $file->getClientOriginalName();

    $path = route('pdf-view-route', $zone->name);
    $zone->qr_codePDF = QrCode::size(500)->generate($path, public_path('qrcodesPID/' . $zone->name . '.svg'));
}

        $zone->save();

        return redirect('/home');

    }
    public function update($zoneid){

        $zone = Zones::find($zoneid);
        $zone->name = request('name');
        $zone->description = request('description');
        $zone->type = request('type');

        if(request()->file('images')){
            $image = request()->file('images');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images/internimages'), $imageName);
            $zone->images = $imageName;
        }

        if(request()->file('dp')){
            $dp= request()->file('dp');
            $dp->move(public_path('dp'), $dp->getClientOriginalName());
            $zone->dp = $dp->getClientOriginalName();
        }
        $pathdp = route('dp-view-route', $zone->name);
        $zone->qr_codeDP = QrCode::size(500)->generate($pathdp , public_path('qrcodesDP/'.$zone->name.'.svg'));

        //if pdf file imported update it
        if(request()->file('pdf')){
            $file = request()->file('pdf');
            $file->move(public_path('pdf'), $file->getClientOriginalName());
            $zone->pdf = $file->getClientOriginalName();
        }

        $path = route('pdf-view-route', $zone->name);
        $zone->qr_codePDF = QrCode::size(500)->generate($path , public_path('qrcodesPID/'.$zone->name.'.svg'));

        $zone->save();

    }
}
