@extends('layouts.app')

@section('content')

<style>

            html, body{
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 80vh;
                margin: 0;
            }
</style>
<style>
            .card-header
            {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
            }
        </style>

<div class="container">
    <div class="row justify-content-center">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        <div class="col-md-8">
      
            <div class="card">
                <center>
               
               <h3> <div class="card-header">{{ __('Blanka & Krzysztof') }}</div></h3>
               <img class="img-fluid mx-auto d-block" src="/test.png" alt="" width="95" height="105">
               <h3> <div class="card-header">{{ __('15.08.2019 r.') }}</div></h3>


</center>
<div class="card-body">

<form action="{{url('/test')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class = "form-group mb-3">
<label for="image">Zdjęcie:</label>

<input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" required autocomplete="image">
@error('image')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class = "form-group mb-3">
<label for="description">Wiadomość:</label>
<textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" required autocomplete="description"></textarea>
@error('description')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class = "form-group mb-3">
<label for="name">Podpis:</label>
<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name">
@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>



<br>

<div class = "form-group mb-3 text-center">
<button type="submit" class="btn btn-secondary btn-lg"> Zapisz </button>
</div>
</form>
</div>


            </div>
        </div>
    </div>
</div>
@endsection
