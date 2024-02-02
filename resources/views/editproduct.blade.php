

@extends('layouts.app')
<x-guest-layout>


   
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>

                <div class="card-body">

    <form method="POST" action="{{ route('updateproduct', $product->id ) }}" enctype="multipart/form-data">
        @csrf
       <!--  method('PATCH')  -->

        <!-- Title -->
        <div>
            <x-input-label for="title" :value="__('title')" />
            <x-text-input id="title" class="form-control" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

          <!-- Description -->
          <div>
            <x-input-label for="description" :value="__('description')" />
            <x-text-input id="description" class="form-control" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

          <!-- Price -->
          <div>
            <x-input-label for="price" :value="__('price')" />
            <x-text-input id="price" class="form-control" type="number" step="any" name="price" :value="old('price')" required autofocus autocomplete="price" />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

          <!-- image -->
          <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" class="form-control" type="file" name="image" :value="old('image')"  autofocus autocomplete="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
        
       
       
           

            <x-primary-button class="btn btn-primary">
                {{ __('Edit Product') }}
            </x-primary-button>

            
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('dashboard') }}">
                {{ __('Cancel') }}
            </a>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>

</x-guest-layout>
