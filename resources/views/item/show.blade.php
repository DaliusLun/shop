

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Prekė</div>
               <div class="card-body">
               <table class="table">

                    <tbody>
                        <tr>
                            <th scope="row">Pavadinimas</a></th>
                            <th scope="row">{{$item->name}}</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Kaina</a></th>
                            <th scope="row">{{$item->price}}</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Nuolaida</a></th>
                            <th scope="row">{{$item->discount}}</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Aprašymas</a></th>
                            <th scope="row">{{$item->description}}</a></th>
                        </tr>
                        @foreach ($item->parameters as $parameter)
                            <br>
                            <tr>
                                <th scope="row">{{$parameter->title}}</a></th>
                                <th scope="row">{{$parameter->pivot->data}} {{$parameter->data_type}}</a></th>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
               </div>
           </div>
       </div>
   </div>
</div>

@endsection