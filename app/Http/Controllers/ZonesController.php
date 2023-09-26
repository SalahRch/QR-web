<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ZonesController extends Controller
{

    public function display()
    {
        return view('zones.all');
    }


    public function displayzones($type)
    {
        $zones = Zones::where('type', $type)->get();
        return view('zones.displayzones', compact('zones'));
    }
    public function displaypdf()
    {
        $zones = Zones::all();
        return view('zones.displaypdf',compact('zones'));
    }
    public function search(){
        $search_text = $_GET['search'];
        $zones = Zones::where('name', 'LIKE', '%'.$search_text.'%')->get();
        return view('zones.search', compact('zones'));
    }
    public function getDownload($zoneid)
    {
        $zone = Zones::find($zoneid);

        $file = public_path() . "/pdf/" . $zone->pdf;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $zone->name . '.pdf', $headers);
    }
    public function admin()
    {
        $apiKey = 'e18ead73144242feaaf105644231409';
        $location = 'Jorf';

        $response = Http::get("http://api.weatherapi.com/v1/current.json?key=$apiKey&q=$location&aqi=no");

        $weatherData = $response->json();

        //pass zones data as well

        return view('admin.admin', ['weatherData' => $weatherData,'users' => User::all(), 'zones' => Zones::all()]);

    }
    public function index($zoneid)
    {
        $zone = Zones::find($zoneid);
        return view('zones.index', compact('zone'));
    }
    public function dp($zoneid)
    {
        $zone = Zones::find($zoneid);
        return view('zones.dp', compact('zone'));
    }
    public function other($zoneid)
    {
        $zone = Zones::find($zoneid);
        return view('zones.other', compact('zone'));
    }

    public function editmenu()
    {
        $zones =  Zones::all();
        return view('admin.editmenu', compact('zones'));
    }
    public function deletemenu()
    {
        $zones =  Zones::all();
        return view('admin.deletemenu', compact('zones'));
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
        unlink(public_path('dp/'.$zone->dp));
        unlink(public_path('images/logo/'.$zone->logo));
        unlink(public_path('other/'.$zone->other));

        return redirect('/home');
    }

    public function create()
    {
        return view('zones.create');
    }
public function createuser()
    {
        return view('admin.createuser');
    }

public function edituser()
    {
        $users = User::all();
        return view('admin.editusermenu', compact('users'));
    }
    public function editsolo($id)
    {
        $user = User::find($id);
        return view('admin.edituser', compact('user'));
    }
    public function deleteuser()
    {
        $users = User::all();
        return view('admin.deleteuser', compact('users'));
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

    public function store(Request $request){
/*
         $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'pdf' => 'required',
            'qr_code' => '',
        ]);
*/
        $rules = [
            'name' => 'required', // Field1 is not supposed to be null
            'description' => 'nullable', // Field2 is not supposed to be null
            // Add rules for other fields as needed
            'pdf' => 'nullable',
            'dp' => 'nullable',
            'other' => 'nullable',
            'images' => 'nullable',
            'logo' => 'nullable',
            'type' => 'required',

        ];
        $messages = [
            'name.required' => 'Name is required.',
            'type.required' => 'Type is required.',
            // Add custom error messages for other fields
        ];
        $request->validate($rules, $messages);

        $zone = new Zones();
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

        $path = route('dp-view-route', $zone->name);
        $zone->qr_codeDP = QrCode::size(500)->generate($path , public_path('qrcodesDP/'.$zone->name.'.svg'));
}
if(request()->file('other')){
        $other = request()->file('other');
        $otherName = $other->getClientOriginalName();
        $other->move(public_path('other'), $otherName);
        $zone->other = $otherName;

        $pathother = route('other-view-route', $zone->name);
        $zone->qr_codeOther = QrCode::size(500)->generate($pathother , public_path('qrcodesOther/'.$zone->name.'.svg'));
}
if(request()->file('logo')){
        $logo = request()->file('logo');
        $logoName = $logo->getClientOriginalName();
        $logo->move(public_path('images/logo'), $logoName);
        $zone->logo = $logoName;
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
        if(request()->file('logo')){
            $logo = request()->file('logo');
            $logoName = $logo->getClientOriginalName();
            $logo->move(public_path('images/logo'), $logoName);
            $zone->logo = $logoName;
        }
        if(request()->file('other')){
            $other = request()->file('other');
            $otherName = $other->getClientOriginalName();
            $other->move(public_path('other'), $otherName);
            $zone->other = $otherName;
        }
        $pathother = route('other-view-route', $zone->name);
        $zone->qr_codeOther = QrCode::size(500)->generate($pathother , public_path('qrcodesOther/'.$zone->name.'.svg'));


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
