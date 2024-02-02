@extends('layouts.navigation')
@extends('layouts.app')

@php
    $list = DB::table('products')->get();
@endphp




<!Doctype html>
<html>
 <head> </head>   

   
<body>
   


<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>


         
      



        <div class="container">
    <table class="table">
        <tbody>
    
             

            @php $count = 0; @endphp
            @foreach($list as $item)
                @if($count % 3 == 0)
                    <tr>
                @endif

                <td>
                    <div class="card" style="width: 18rem;">
                    

                        <div class="card-body">
                            <h5 class="card-title">{{$item->title}}</h5>
                            <p class="card-text">{{$item->description}}</p>
                            <p class="card-text">{{$item->price}}$</p>
                            


                         <?php
                            $sousChaineASupprimer = "public/";

                            $path = str_replace( $sousChaineASupprimer, '', $item->image);
                        ?>
                        
                            
                           <img src="{{ asset( 'storage/' .$path) }}" class="img-fluid">  
                            
                           <p>Chemin de l'image : {{ asset('storage/'  .$path) }}</p> 


                            <a href="#" class="btn btn-primary">Buy</a>
                        </div>
                    
                         <form action="{{ route('deleteproduct', ['product' => $item->id]) }}" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit?')">
                              @csrf
                            <button type="submit">Supprimer</button>
                        </form>

                          @if (Route::has('editproduct'))  
    <a href="{{ route('editproduct', ['id' => $item->id])  }}" 
    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
          Edit Product</a>
    @endif

                    </div>
                </td>

                @if($count % 3 == 2 || $count == count($list) - 1)
                    </tr>
                @endif

                @php $count++; @endphp
            @endforeach
        </tbody>
    </table>
</div>


    
    @if (Route::has('addproduct'))  
    <a href="{{ route('addproduct') }}" 
    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
          Add Product</a>
    @endif

  
    
 </div> 
</body>
</html>


