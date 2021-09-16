@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Koreguoti augalą</div>
               <div class="card-body">
                  <form method="POST" action="{{route('category.update',[$category])}}">
                     <div class="form-group">
                        <label>Pavadinimas</label>
                        <input type="text" name="name"  class="form-control" value="{{$category->name}}">
                        <small class="form-text text-muted">Kategorijos pavadinimas.</small>
                     </div>
                     <div class="form-group">
                        <label>Augalas</label>
                        <select class="form-control" name="category_id">
                           @foreach ($categories as $categoriesOne)
                              <option value="{{$categoriesOne->id}}"> 
                              {{$categoriesOne->name}}
                              </option>
                           @endforeach
                        </select>
                        <small class="form-text text-muted">Pasirinkite augalo rūšį.</small>
                     </div>

                     <div class="form-group">
                        <label>Augalas</label>
                        <select class="form-control" name="parameters[]" multiple>
                           @foreach ($parameters as $parameter)
                              <option value="{{$parameter->id}}"> 
                              {{$parameter->title}} {{$parameter->data_type}}
                              </option>
                           @endforeach
                        </select>
                        <small class="form-text text-muted">Pasirinkite augalo rūšį.</small>
                     </div>
                     @csrf
                     <br>
                     <button class="btn btn-primary" type="submit">Koreguoti</button>
                  </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection