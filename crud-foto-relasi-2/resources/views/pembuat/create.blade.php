@extends('layout.app')
@section('content')


<form class="container" action="{{route('pembuat.store')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
	  <label for="exampleInputEmail1">Email address</label>
	  <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
	  <small id="emailHelp" class="form-text text-muted">Input Name pembuat create book </small>
	</div>
	<div class="form-group">
	  <label for="exampleInputPassword1">Foto</label>
	  <input type="file" class="form-control" id="exampleInputPassword1" name="foto">
	</div>

	<button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
@endsection