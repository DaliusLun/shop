
@extends('layouts.app')

@section('content')
<div class="container">

@if(Auth::user() && Auth::user()->isAdmin()) 
    <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin dashboard</div>
                <div class="card-body">
                    <form style="display:inline-block" action="{{route('category.store')}}" method="post">
                        @csrf
                        <input type="text" name="name">
                        @php
                            if(count($chain) == 0) {
                                $categoryId = 0;
                            } else {
                                $categoryId = $chain[count($chain) -1]->id;
                            }
                        @endphp
                        <input type="hidden" name="category_id" value="{{$categoryId}}">
                        <button type="submit">Pridėti</button>
                    </form>
                    @if(count($chain) > 0)
                        <a style="font-size:15px" href="{{route('item.create',[$chain[count($chain)-1]]->id)}}">Įdėti prekę į "{{$chain[count($chain)-1]->name}}" kategoriją</a>
                    @endif
                </div>
            </div>
       </div>
    </div>
@endif

   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
                <div class="card-header">
               <h1>{{(count($chain) > 0)?$chain[count($chain)-1]->name:""}}</h1>
               </div>
               <div class="card-header">
               <a href="{{route('category.index')}}">HOME</a><br>
                    @foreach ($chain as $item)
                        <a href="{{route('category.map',$item)}}">{{$item->name}} > </a>
                    @endforeach
               </div>


               <div class="card-body">
               <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Pavadinimas</th>
                        @if(Auth::user() && Auth::user()->isAdmin())
                        <th scope="col" style="text-align:center">Veiksmai</th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                        <th scope="row"><a href="{{route('category.map',$category)}}">{{$category->name}}</a></th>
                        @if(Auth::user() && Auth::user()->isAdmin()) 
                        <td style="text-align:center">
                            <a href="{{route('category.edit',[$category])}}"><button class="btn btn-primary">Koreguoti</button></a>
                        @if(Auth::user())
                            <form style="display:inline-block" method="POST" action="{{route('category.destroy', [$category])}}">
                                @csrf
                                <button class="btn btn-danger" type="submit" >Pašalinti</button>
                            </form>
                        @endif
                        </td>
                        @endif
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
