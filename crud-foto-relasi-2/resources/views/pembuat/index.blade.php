@extends('layout.app')
@section('content')
<table class="table table-dark container">

    <thead>
      <tr><th scope="col" colspan="4"><a href="{{route('pembuat.create')}}" class="btn btn-info">add</a></th></tr>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Foto</th>
        <th scope="col">Nama</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $i=0 ?>
        @foreach ($item as $items)  
        <?php $i++ ?>
      <tr>
        <th scope="row">{{$i}}</th>
        <td><img src="{{url('public/Image/'.$items->foto)}}" alt=""></td>
        <td>{{$items->name}}</td>
        <td>
            <a href="{{route('pembuat.edit',$items->id)}}" class="btn btn-info">
                <i class="fa fa-pencil-alt">Edit</i>
            </a>
            <form action="{{route('pembuat.destroy',$items->id)}}" method="post" class="d-inline" >
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