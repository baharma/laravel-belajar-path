@extends('layout.app')
@section('content')


<form class="container" action="{{route('buku.store')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
	  <label for="exampleInputEmail1">Email address</label>
	  <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
	</div>

    <div class="input-group mt-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Pembuat nama</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="pembuat_id">
            @foreach($item as $items)
            <option value="{{ $items->id}}">
                {{$items->name}}
            </option>
        @endforeach
        </select>
      </div>

      <div class="form-group mt-3">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="gendre" aria-describedby="emailHelp" placeholder="Enter Name">
      </div>

	<button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
@endsection