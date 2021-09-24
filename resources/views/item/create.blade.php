@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pridėti prekę į "{{$category->name}}" kategoriją</div>
                <div class="card-body">
                    <form method="POST" action="{{route('item.store')}}">
                    <div class="form-group">
                        <label>Pavadinimas</label>
                        <input type="text" name="name"  class="form-control">
                        <!-- <small class="form-text text-muted">Augalo amžius.</small> -->
                        <br>
                        <label>Kaina</label>
                        <input type="text" name="price"  class="form-control">
                        <br>
                        <label>Aprašymas</label>
                        <input type="text" name="description"  class="form-control">
                        <br>
                        <label>Gamintojas</label>
                        <input type="text" name="manufacturer"  class="form-control">
                        <br>
                        <label>Kiekis</label>
                        <input type="text" name="quantity"  class="form-control">
                        <br>
                        <label>Nuolaida</label>
                        <input type="text" name="discount"  class="form-control">
                        <input type="hidden" name="category_id" value="{{$category->id}}">
                        @foreach ($params as $parameter)
                            <br>
                            <label>{{$parameter[0]->title}}</label>
                            <input type="text" name="{{$parameter[0]->id}}" class="form-control" placeholder="{{$parameter[0]->data_type}}">
                        @endforeach     
                    </div>
                        @csrf
                        <br>
                        <button class="btn btn-success" type="submit">Pridėti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection