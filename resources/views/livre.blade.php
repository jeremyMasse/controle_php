@extends('layout')

@section('contenu')
<?php 
    $i = 0;
    $rempli = "★";
    $vide = "☆";
    if ($i > 5){
      $max = 5;
    }
    else{
      $max = $i;
    }
    $i = 0;?> 
    @include('flash::message')
<div class="container_prod">
    <div class="col-lg-9">
      <div class="card mt-4 card-flex">
        <img class="card-img-top img-fluid" src="<?php //echo "images/".$livre->photo;?>" alt="">
        <div class="card-body">
          <h3 class="card-title"> {{ $livre->titre }} </h3>
          <p class="card-text espace-prod">{{ $livre->description }}</p>
          <span class="text-warning">
            @while($i < 5)
              @if ($i < $livre->note)
                {{$rempli}}
              @else
                {{$vide}}
              @endif
              <?php $i = $i + 1; ?>
            @endwhile
          </span>
          <h4 class="prix-prod">Prix : {{ $livre->prix }}€</h4>
        </div>
    </div>
    @auth
        <div class="card mt-4 paiement_prod"> 
            <form action="{{$livre->id}}/possede" method="post">
                {{ csrf_field() }}
                @if(auth()->user()->possession($livre))
                    {{method_field('delete')}}
                    <button type="submit" class="btn btn-primary">Enlever de ma bibliothèque</button>
                @else
                    {{method_field('post')}}
                    <button type="submit" class="btn btn-primary">Ajouter a ma bibliothèque</button>
                @endif
            </form>
        </div>
    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Avis acheteur
      </div>
      <div class="card-body">
<!--  
          @for ($i = 0; $i < $max; $i++)
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> {{ $avi[$i]->note }}
            <p>{{ $avi[$i]->description }}</p>
            <small class="text-muted">Posté le {{ $avi[$i]->date_avi }} </small>
            <hr>
          @endfor
        @else -->
          <p>Il n'y a aucun avi pour ce livre</p>
        <!-- @endif -->
      </div>
    </div>
  </div>
</div>
@endsection