<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //public function create(): View
    
        return view('addproduct');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $this->validate($request, [
            'id',
            'title',
            'description',    
            'price',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
    
          //  'App\Models\Product'::create($request->all());
  
          // Téléchargement de l'image
    $imagePath = $request->file('image')->store('public/images');

    // Création du produit avec le chemin de l'image
    'App\Models\Product'::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'image' => $imagePath,
    ]);


          return redirect()->intended(RouteServiceProvider::HOME);
    }

   



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id )
    {
        //  // ProductController.php
        $product = Product::findOrFail($id);

      return view('editproduct', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */

     // ProductController.php

public function update(Request $request, $id): RedirectResponse
{
    $product = Product::findOrFail($id); // Assurez-vous que le produit existe

    // Mettez à jour les champs du produit avec les nouvelles valeurs

  //  $imagePath = $request->file('image')->store('public/images');

  //  $imageFile = $request->file('image');
// dd($imageFile); // Ajoutez cette ligne pour vérifier le contenu de $imageFile
// $imagePath = $imageFile->store('public/images');


    $product->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),

      //  'image' => $request->input('image'),
        // Ajoutez d'autres champs selon votre modèle
       // 'image' => $imagePath,
    ]);

    // Redirigez vers la page de détails du produit ou ailleurs après la mise à jour
    // return redirect()->route('showproduct', $product->id);
    return redirect()->intended(RouteServiceProvider::HOME);
}

   /* public function update(Request $request, Product $product)
    {
        //
    }
    */

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product $product)
    {
        // Suppression du produit ici
        $product->delete();
    
        return back()->with('success', 'Produit supprimé avec succès');
    }
    
}


