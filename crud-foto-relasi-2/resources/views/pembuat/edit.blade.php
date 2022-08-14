@extends('layout.app')
@section('content')


<form class="container" action="{{route('pembuat.update',$items->id)}}" method="POST" enctype="multipart/form-data">
	@csrf
    @method('PUT')
	<div class="form-group">
	  <label for="exampleInputEmail1">Email address</label>
	  <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter Name" value="{{$items->name}}">
	  <small id="emailHelp" class="form-text text-muted">Input Name pembuat create book </small>
	</div>
	<div class="form-group">
	  <label for="exampleInputPassword1">Foto</label>
	  <input type="file" class="form-control" id="exampleInputPassword1" name="foto">
      <img src="{{url('public/Image/'.$items->foto)}}" alt="">
	</div>

	<button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
@endsection