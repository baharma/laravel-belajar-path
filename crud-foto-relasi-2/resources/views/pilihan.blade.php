@extends('layout.app')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card m-4" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Pembuat</h5>
          <p class="card-text">Memasukan data Pembuat buku tersebut</p>
          <a href="{{route('pembuat.index')}}" class="btn btn-primary">Go Pembuat</a>
        </div>
      </div>
      <div class="card m-4" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Buku</h5>
          <p class="card-text">Membuat list buku pastikan membuat nama pembuat dahulu.</p>
          <a href="{{route('buku.index')}}" class="btn btn-primary">Go Buku</a>
        </div>
      </div>
</div>
@endsection