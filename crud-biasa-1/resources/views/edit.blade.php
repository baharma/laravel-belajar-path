@extends('form.app')
@section('content')
@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
@endif
<form class="container" action="{{route('buku.update',$items->id)}}" method="POST">
    @csrf
    @method('PUT')
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">nama</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$items->name}}">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Pembuat</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="pembuat" value="{{$items->pembuat}}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection