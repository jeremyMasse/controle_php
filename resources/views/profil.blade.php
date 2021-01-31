@extends('layout')

@section('contenu')
<style>
    .form_livre {
        margin: 1em auto 2em;
        width: 400px;
        padding: 1em;
        border: 1px solid #CCC;
        border-radius: 1em;
    }

    form div+div {
        margin-top: 1em;
    }

    input {
        font: 1em sans-serif;
        width: 365px;
        box-sizing: border-box;
        border: 1px solid #999;
    }

    input:focus {
        border-color: #000;
    }
</style>
<div class="container bootstrap snipets">
    <h1 class="text-center text-muted">Votre bibliothèque</h1>
    <div class="row">
        @if(auth()->user()->posseder->isEmpty())
            <p>Vous ne possedez aucun livre</p>
        @else
            @foreach (auth()->user()->posseder as $l)
                <div class="product tumbnail thumbnail-3">
                    <a href="{{ route('livre', [$l->id]) }}">
                        <img src="https://via.placeholder.com/250<?php // echo "images/".$livres->photo;?>" alt="" class="image_produit">
                    </a>
                    <div class="caption">
                        <h6><a href="{{ route('livre', [$l->id]) }}">{{ $l->titre }}</a> 
                        <span class="auteur">{{ $l->auteur }}</span></h6>
                        <span class="price">{{ $l->prix }}€</span>
                        <form action="/livre/{{$l->id}}/possede" method="POST">
                            {{ csrf_field() }}
                            {{method_field('delete')}}
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> 
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="container bootstrap snipets">
        <h1 class="text-center text-muted">Ajouter un livre</h1>
        <form class="form_livre" action="/livre/ajouter" method="post">
            {{csrf_field()}}
            <div>
                <input type="string" name="titre" placeholder="Titre">
            </div>
            <div>
                <input type="string" name="auteur" placeholder="Auteur">
            </div>
            <div>
                <input type="string" name="prix" placeholder="Prix">
            </div>
            <div>
                <input type="number" name="note" placeholder="Note"  min="0" max="5">
            </div>
            <div>
                <input type="submit" value="Ajouter">
            </div>
        </form>
    </div>
</div>                 
@endsection