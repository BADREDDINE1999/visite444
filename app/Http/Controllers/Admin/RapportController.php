<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Produit;
use App\Models\Visite;
use App\Models\Produitdmd;
use App\Models\Produitprp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


class RapportController extends Controller
{
    public function create1()
    {
        $client = Client::all();
        return view('admin.rapport.step1', compact('client'));
    }
    public function store1(Request $request)
    {
        $request->validate([
            //'nom-client'=>'required|string|max:255',
            'date_visite' => 'required',
            'date_entre' => 'required',
            'date_sortie' => 'required',
        ]);
        $visite = new Visite;
        $visite->client_id = $request->client_id;
        $visite->date_visite = $request->date_visite;
        $visite->date_entre = $request->date_entre;
        $visite->date_sortie = $request->date_sortie;
        $visite->progression = 1;
        $visite->user_id = Auth::user()->id;
        $visite->save();
        return redirect('admin/step2');
    }
    public function edit2()
    {
        $visite_id = Visite::max('id');
        $visite = Visite::find($visite_id);
        $client_id = $visite->client_id;
        $client = Client::find($client_id);
        return view('admin.rapport.step2', compact('client'));
    }
    public function update2(Request $request)
    {
        $request->validate([
            'nom_client' => 'required|string|max:255',
            'societe' => 'required|string|max:255',
            'tele_client' => 'required|numeric|min:10',
            'tele_client2' => 'nullable|numeric|min:10',
            'ville' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'photo' => 'nullable',
            'game_commercialise' => 'nullable|string|max:255',
            'marque_commercialise' => 'nullable|string|max:255',
            'fournisseur' => 'nullable|string|max:255'
        ]);
        $visite_id = Visite::max('id');
        $visite = Visite::find($visite_id);
        $client_id = $visite->client_id;
        $client = Client::find($client_id);
        if ($request->has('photo')) {
            //Get image`s path
            $destination = 'storage/imageUp' . $client->photo;
            //delete the file if exits
            if (File::exists($destination)) {
                File:
                delete($destination);
            }
            // Get image file
            $image = $request->file('photo');
            // Make a image name based on user name and current timestamp " générer un nom pour l'image
            $name = Str::slug($request->input('societe')) . '_' . time();
            $folder = 'storage/imageUp';
            //storing path of image // extension png jpeg
            $img = $image->move($folder, $name . '.' . $image->getClientOriginalExtension());
            $client->photo = $img;
        }
        $client->nom_client = $request->nom_client;
        $client->societe = $request->societe;
        $client->c_client = null;
        $client->tele_client = $request->tele_client;
        $client->tele_client2 = $request->tele_client2;
        $client->ville = $request->ville;
        $client->region = $request->region;
        $client->localisation = $request->localisation;
        $client->game_commercialise = $request->game_commercialise;
        $client->marque_commercialise = $request->marque_commercialise;
        $client->fournisseur = $request->fournisseur;
        $client->user_id = Auth::user()->id;

        $visite->progression = 2;
        $visite->update();
        $client->update();
        return redirect('admin/step3/' . $visite_id);
    }

    public function create3()
    {
        $produit = Produit::all();
        return view('admin.rapport.step3', compact('produit'));
    }
    public function store3(Request $request)
    {
        $request->validate([
            //'nom-client'=>'required|string|max:255',
            'produitsdemande[]' => 'string|max:500',
            'produitsdemandendp[]' => 'string|max:500',
            'produitsprp[]' => 'string|max:500',
        ]);

        //dd(Request('produitsdemandendp'));
        $input = $request->all();
        $produitsdemande = $input['produitsdemande'];
        $produitsdemandendp = $input['produitsdemandendp'];
        $produitsprp = $input['produitsprp'];

        /*$input['produitsdemande'] = implode(',',$produitsdemande);
        $input['produitsdemandendp'] = implode(',',$produitsdemande);
        $input['produitsprp'] = implode(',',$produitsdemande);
        //dd($input['produitsdemande']);*/

        /*$produitsdemande = $request->produitsdemande;
        $produitsdemandendp = $request->produitsdemandendp;
        $produitsprp = $request->produitsprp;*/
        /*$produit1 = new Produitdmd;
        $produit2 = new Produitdmd;
        $produit3 = new Produitprp;*/
        DB::beginTransaction();

        $visite_id = Visite::max('id');



        /*$produit1 = Produitdmd::where(['produitsdemande'=>Request('produitsdemande')])->get();
        dd($produit1->product_id);
        foreach($produitsdemande as $item){
        $produit1 -> product_id = $item;
        $produit1 -> visite_id = $visite_id;
        $produit1 -> statut = 'disponible';
        // dd($item);
        $produit1 -> save();
        }
        */
        foreach ($produitsdemande as $produitDemandeID) {
            $produitDemande = Produitdmd::find($produitDemandeID);

            $produitDemande->update([
                'statut' => 'non disponible'
            ]);
            /*$produitDemande->statut = 'non disponible';
            dd($produitDemande);
            $produitDemande->save();*/
        }

        foreach ($produitsdemandendp as $produitDemandeNDPID) {
            $produitDemandeNDP = Produitdmd::find($produitDemandeNDPID);
            $produitDemandeNDP->statut = 'non disponible';
            $produitDemandeNDP->save();
        }





        /*foreach($produitsdemandendp as $item){
        $produit2 -> product_id = $item;
        $produit2 -> visite_id = $visite_id;
        $produit2 -> statut = 'non disponible';
        $produit2 -> save();
        }
        foreach($produitsprp as $item){
        $produit3 -> product_id = $item;
        $produit3 -> visite_id = $visite_id;
        $produit3 -> Feedback = 'test';
        $produit3 -> save();
        }*/
        return redirect('admin/step4/' . $visite_id);
    }
    public function create4()
    {
        $visite_id = Visite::max('id');
        $produitdmdid = DB::table('produitdmds')->where('statut', 'disponible')->where('visite_id', $visite_id)->get('product_id');
        $produitprpid = DB::table('produitprps')->where('visite_id', $visite_id)->get('product_id');
        $produitprp = array();
        $produitdmd = array();
        //dd($produitdmdid);
        foreach ($produitdmdid as $item) {
            array_push($produitdmd, DB::table('produits')->where('id', $item->product_id)->get('code_article'));
        }
        foreach ($produitdmdid as $item) {
            array_push($produitprp, DB::table('produits')->where('id', $item->product_id)->get('code_article'));
        }
        //$dmddes =
        //dd($produitdmd);
        //dd($produitprp);
        //Produitprp::find($visite_id);
        return view('admin.rapport.step4', compact('produitdmd', 'produitprp'));
    }
    public function create5()
    {
        return view('admin.rapport.step5');
    }

}
