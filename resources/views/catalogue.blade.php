@extends('layout')

@section('contenu')

    <div class="container bootstrap snipets">
    <h1 class="text-center text-muted">Bibliothèque de livre</h1>
    <div class="row flow-offset-1">
    @foreach ($livres as $l)
     <div class="col-xs-6 col-md-4 produit">
       <div class="product tumbnail thumbnail-3">
          <a href="{{ route('livre', [$l->id]) }}">
            <img src="https://via.placeholder.com/250<?php // echo "images/".$livres->photo;?>" alt="" class="image_produit">
          </a>
          
         <div class="caption">
           <h6><a href="{{ route('livre', [$l->id]) }}">{{ $l->titre }}</a> 
           <span class="auteur">{{ $l->auteur }}</span></h6>
            <span class="price">{{ $l->prix }}€</span>
         </div>
       </div>
     </div>
     @endforeach
 @endsection