@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#addCategoryModal">
          <i class="fas fa-plus"></i>
          Tambah Data Sales
        </button>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        <thead>
          <tr>
            <th>No</th>
            <th>Nama Sales</th>
            <th>Email</th>
            <th>Register</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach($sales as $data)
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->created_at }}</td>
            <td>
              <a href="#" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('sales.delete', $data->id) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
            @endforeach
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection