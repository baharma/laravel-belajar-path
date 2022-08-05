@extends('form.app')
@section('content')
<form class="container" action="{{route('buku.store')}}" method="POST">
  @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">nama</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Pembuat</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="pembuat">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
<br>

  <table class="table container">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">pembuat</th>
      </tr>
    </thead>
    <tbody>
        @foreach($items as $p)
        <tr>
        <th scope="row">{{$p->id}}</th>
        <td>{{$p->name}}</td>
        <td>{{$p->pembuat}}</td>
        <td>
            <a href="{{route('buku.edit',$p->id)}}">Edit</a>
            |
            <form action="{{ route('buku.destroy', $p->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>   
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection