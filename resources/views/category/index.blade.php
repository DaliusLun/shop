
@extends('layouts.app')

@section('content')
<div class="container">

    @if(Auth::user() && Auth::user()->isAdmin()) 
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin dashboard</div>
                    <div class="card-body">
                            <!-- <form style="display:inline-block" action="{{route('category.store')}}" method="post">
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
                            </form> -->
                        <a style="font-size:15px" href="{{route('category.create',[count($chain) !== 0?$chain[count($chain)-1]:'0'])}}">Nauja kategorija šiame gylyje</a><br>
                        @if(count($chain) > 0)
                            <a style="font-size:15px" href="{{route('item.create',[$chain[count($chain)-1]])}}">Įdėti prekę į "{{$chain[count($chain)-1]->name}}" kategoriją</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (count($chain) > 0)
                    <div class="card-header">
                        <h1>{{(count($chain) > 0)?$chain[count($chain)-1]->name:""}}</h1>
                    </div>
                @endif

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

    @if(count($chain) > 0 && count($items) > 0) 

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Prekės</div>
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
                                @foreach ($items as $item)
                                    <tr>
                                        <th scope="row">{{$item->name}}</th>
                                        @if(Auth::user() && Auth::user()->isAdmin()) 
                                            <td style="text-align:center">
                                                <a href="{{route('item.show',[$item])}}">
                                                    <button class="btn btn-primary">Show</button>
                                                </a>
                                                <a href="{{route('item.edit',[$item,$chain[count($chain)-1]])}}">
                                                    <button class="btn btn-primary">Koreguoti</button>
                                                </a>
                                                <form style="display:inline-block" method="POST" action="{{route('item.destroy', [$item])}}">
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit" >Pašalinti</button>
                                                </form>
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
    @endif
</div>
@endsection
