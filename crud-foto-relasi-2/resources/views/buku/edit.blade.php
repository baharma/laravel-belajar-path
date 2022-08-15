@extends('layout.app')
@section('content')


<form class="container" action="{{route('buku.update',$items->id)}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('put') }}
	<div class="form-group">
	  <label for="exampleInputEmail1">Email address</label>
	  <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter Name" value="{{$items->name}}">
	</div>

    <div class="input-group mt-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Pembuat nama</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="pembuat_id">
            <option value="{{$items->pembuat1->id}}">{{$items->pembuat1->name}}</option>
            @foreach($data as $ite)
            <option value="{{ $ite->id}}">
                {{$ite->name}}
            </option>
        @endforeach
        </select>
      </div>

      <div class="form-group mt-3">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="gendre" aria-describedby="emailHelp" placeholder="Enter Name" value="{{$items->gendre}}">
      </div>

	<button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
@endsection