@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pl.min.js"></script>
  <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  


	<script type="text/javascript" src="documentation-assets/jquery.timepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="documentation-assets/jquery.timepicker.css" />
	<script type="text/javascript" src="documentation-assets/bootstrap-datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="documentation-assets/bootstrap-datepicker.css" />


  @endsection


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
    <div class="card vertical-center">
    <center>
 <h3>    <div class="card-header vertical-center">
 @foreach ($project5 as $object)
    @if ($loop->first)
    <span class="glyphicon glyphicon-heart-empty"></span>
    {{ $object->task->name}}
    <span class="glyphicon glyphicon-heart-empty"></span>
    @endif
   

@endforeach

 </div> </h3>
 </center>

 <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($qrcode as $item)
    <tr>
      <td> <img src="{{ 'uploads/kb/'.$item->image }}" class="img img-responsive text-center" /></td>
     
    </tr>
    <tr>
     
      <td>{{ $item->description }}</td>
     
    </tr>
    <tr>
   
      <td>{{ $item->name}}</td>
   
    </tr>
    <thead>
    
  </thead>
    @endforeach
  
  </tbody>
</table>
    </div>
    <div>
@endsection

