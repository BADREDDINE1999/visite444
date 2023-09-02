<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProduitController extends Controller
{
    public function index()
    {   $produit = Produit::all();
        return view('admin.produit.index', compact('produit'));
    }



    public function create()
    {
        return view('admin.produit.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'code_article'=> 'required|unique:produits|string|max:255',
            'designation'=> 'required|string|max:255',
            'prix'=> 'required|numeric',
            'stock'=> 'nullable|numeric|min:10',
            'fournisseur'=> 'required|string|max:255',
            'marque'=> 'required|string|max:255',
            'note'=> 'required|string|max:255',
            'type'=> 'nullable',
            'photo'=> 'nullable'
        ]);

        if ($request->has('photo')) {
            // Get image file
            $image = $request->file('photo');
            // Make a image name based on user name and current timestamp " générer un nom pour l'image
            $name = Str::slug($request->input('designation')) . '_' . time();
            $folder = 'storage/imageUp';
            //storing path of image // extension png jpeg
            $img = $image->move($folder, $name . '.' . $image->getClientOriginalExtension());
        }
        else {
            $img= null;
        }
        $produit = new Produit;
        $produit->code_article= $request->code_article;
        $produit->designation= $request->designation;
        $produit->prix = $request->prix;
        $produit->stock = null;
        $produit->fournisseur = $request->fournisseur;
        $produit->marque = $request->marque;
        $produit->note = $request->note;
        $produit->type = $request->type;
        $produit->photo = $img;
        $produit->save();
        return redirect('admin/produit')->with('message','Product Added successfully');
    }



    public function edit($product_id)
    {
        $produit = Produit::find($product_id);
        return view('admin.produit.edit',compact('produit'));
    }



    public function update(Request $request, $product_id)
    {
        $request->validate([
            'code_article'=> 'required|string|max:255',
            'designation'=> 'required|string|max:255',
            'prix'=> 'required|numeric',
            'stock'=> 'nullable|numeric|min:10',
            'fournisseur'=> 'required|string|max:255',
            'marque'=> 'required|string|max:255',
            'note'=> 'required|string|max:255',
            'type'=> 'nullable',
            'photo'=> 'nullable'
        ]);
        $produit = Produit::find($product_id);
        if($request->file('photo'))
        {
            $destination = 'storage/imgeUp'.$produit->photo;
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
        else {
            $img = null;
        }
        $produit->designation= $request->designation;
        $produit->code_article= $request->code_article;
        $produit->prix = $request->prix;
        $produit->stock = null;
        $produit->fournisseur = $request->fournisseur;
        $produit->marque = $request->marque;
        $produit->note = $request->note;
        $produit->type = $request->type;
        $produit->photo = $img;
        $produit->update();
        return redirect('admin/produit')->with('message','Product Updated successfully');
    }
    public function destroy($product_id)
    {
        $produit = Produit::find($product_id);
        $destination = 'storage/imageUp'.$produit->photo;
        //delete the file if exits
        if (File::exists($destination))
        {
            File::delete($destination);
        }
        if($produit)
        {
            $produit->delete();
            return redirect('admin/produit')->with('message','Product deleted successfully');
        }
        else
        {
            return redirect('admin/produit')->with('message','Product deleted successfully');
        }

    }
}
