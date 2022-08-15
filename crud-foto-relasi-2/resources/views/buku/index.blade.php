@extends('layout.app')
@section('content')


<table class="table table-dark container" >
    <thead>
      <tr>
        <th scope="col" colspan="5">
          <a href="{{route('buku.create')}}" class="btn btn-info">dd</a>
        </th>
      </tr>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Foto Pembuat</th>
        <th scope="col">Gendre</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      <?php $i=0 ?>
      @foreach ($item as $items)  
      <?php $i++ ?>
      <tr>
        <th scope="row">{{$i}}</th>
        <td>{{$items->name}}</td>
        <td><img src="{{url('public/Image/'.$items->pembuat1->foto)}}" alt=""></td>
        <td>{{$items->gendre}}</td>
        <td>
          <a href="{{route('buku.edit',$items->id)}}" class="btn btn-info">
              <i class="fa fa-pencil-alt">Edit</i>
          </a>
          <form action="{{route('buku.destroy',$items->id)}}" method="post" class="d-inline" >
              @csrf
              @method('delete')
              <button class="btn btn-danger">
                  <i class="fa fa-trash">Delete</i>
              </button>
          </form>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection