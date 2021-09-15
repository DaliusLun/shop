
@extends('layouts.app')

@section('content')
<div class="container">

@if(Auth::user()->isAdmin()) 
    <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin dashboard</div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="post">
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
                </div>
            </div>
       </div>
    </div>
@endif
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                    @foreach ($chain as $item)
                        <a href="{{route('category.map',$item)}}">{{$item->name}} > </a>
                    @endforeach
               </div>
               <div class="card-body">
                @foreach ($categories as $category)
                        <a href="{{route('category.map',$category)}}">{{$category->name}}   </a><br>
                    @endforeach
               </div>
           </div>
       </div>
   </div>


</div>
@endsection
