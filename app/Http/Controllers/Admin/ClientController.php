<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClientFormRequest;
use App\Models\Client;
//use Illuminate\Http\File;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index()
    {   $client = Client::all();
        return view('admin.client.index', compact('client'));

    }
    public function create()
    {
        return view('admin.client.create');
    }
    /*public function store(ClientFormRequest $request)
    {
            $data = $request->validated();
            $client = new Client();
            $client->nom_client = $data['nom_client'];
            $client->societe = $data['societe'];
            $client->tele_client = $data['tele_client'];
            $client->tele_client2 = $data['tele_client2'];
            $client->region = $data['region'];
            $client->localisation = $data['localisation'];
            $client->photo = $data['photo'];
            $client->game_commercialise = $data['game_commercialise'];
            $client->marque_commercialise = $data['marque_commercialise'];
            $client->fournisseur = $data['fournisseur'];
            if($data->hasfile('photo'))
            {
                $file = $data->file('file');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/client/',$filename);
                $client->photo=$filename;

            }
            $client->user_id = Auth::user()->id;
            $client->save();
            return redirect('admin/client')->with('message','Client Added successfully');

    }*/

    public function store(Request $request)
    {
        $request->validate([

            'nom_client'=>'required|string|max:255',
            'societe'=> 'required|string|max:255',
            'tele_client'=> 'required|numeric|min:10',
            'tele_client2'=> 'nullable|numeric|min:10',
            'ville'=> 'required|string|max:255',
            'region'=> 'required|string|max:255',
            'localisation'=> 'required|string|max:255',
            'photo'=> 'nullable',
            'game_commercialise'=> 'nullable|string|max:255',
            'marque_commercialise'=> 'nullable|string|max:255',
            'fournisseur'=> 'nullable|string|max:255'
        ]);

        if ($request->has('photo')) {
            // Get image file
            $image = $request->file('photo');
            // Make a image name based on user name and current timestamp " générer un nom pour l'image
            $name = Str::slug($request->input('societe')) . '_' . time();
            $folder = 'storage/imageUp';
            //storing path of image // extension png jpeg
            $img = $image->move($folder, $name . '.' . $image->getClientOriginalExtension());

        }
        else{
            $img= null;
        }
        $client = new Client;

            $client->nom_client = $request->nom_client;
            $client->societe = $request->societe;
            $client->c_client = null;
            $client->tele_client = $request->tele_client;
            $client->tele_client2 = $request->tele_client2;
            $client->ville = $request->ville;
            $client->region = $request->region;
            $client->localisation = $request->localisation;
            $client->photo = $img;
            $client->game_commercialise= $request->game_commercialise;
            $client->marque_commercialise=$request->game_commercialise;
            $client->fournisseur=$request->fournisseur;
            $client->user_id=Auth::user()->id;
            $client->save();
        return redirect('admin/client')->with('message','Client Added successfully');
    }
    public function edit($client_id)
    {
        $client = Client::find($client_id);
        return view('admin.client.edit',compact('client'));
    }
    public function update(Request $request, $client_id)
    {
        $request->validate([
            'nom_client'=>'required|string|max:255',
            'societe'=> 'required|string|max:255',
            'tele_client'=> 'required|numeric|min:10',
            'tele_client2'=> 'nullable|numeric|min:10',
            'ville'=> 'required|string|max:255',
            'region'=> 'required|string|max:255',
            'localisation'=> 'required|string|max:255',
            'photo'=> 'nullable',
            'game_commercialise'=> 'nullable|string|max:255',
            'marque_commercialise'=> 'nullable|string|max:255',
            'fournisseur'=> 'nullable|string|max:255'
        ]);
        $client = Client::find($client_id);
        if ($request->file('photo')) {
            //Get image`s path
            $destination = 'storage/imageUp'.$client->photo;
            //delete the file if exits
            if (File::exists($destination))
            {
                File::delete($destination);
            }
            // Get image file
            $image = $request->file('photo');
            // Make a image name based on user name and current timestamp " générer un nom pour l'image
            $name = Str::slug($request->input('societe')) . '_' . time();
            $folder = 'storage/imageUp';
            //storing path of image // extension png jpeg
            $img = $image->move($folder, $name . '.' . $image->getClientOriginalExtension());
        }
        else{
            $img = null;
        }
        $client->nom_client = $request->nom_client;
        $client->societe = $request->societe;
        $client->c_client = null;
        $client->tele_client = $request->tele_client;
        $client->tele_client2 = $request->tele_client2;
        $client->ville = $request->ville;
        $client->region = $request->region;
        $client->localisation = $request->localisation;
        $client->photo = $img;
        $client->game_commercialise = $request->game_commercialise;
        $client->marque_commercialise = $request->marque_commercialise;
        $client->fournisseur = $request->fournisseur;
        $client->user_id = Auth::user()->id;
        $client->update();
        return redirect('admin/client')->with('message','Client Updated successfully');
    }
    public function destroy($client_id)
    {
        $client = Client::find($client_id);
        $destination = 'storage/imageUp'.$client->photo;
        //delete the file if exits
        if (File::exists($destination))
        {
            File::delete($destination);
        }
        if($client)
        {
            $client->delete();
            return redirect('admin/client')->with('message','Client deleted successfully');
        }
        else
        {
            return redirect('admin/client')->with('message','Client deleted successfully');
        }

    }
}
