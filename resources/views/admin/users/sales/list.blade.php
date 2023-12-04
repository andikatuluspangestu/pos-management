@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <!-- Tombol Tambah Data -->
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('sales.insert.add') }}" class="btn btn-sm btn-primary mb-3">
              <i class="fas fa-plus"></i> Tambah Data
            </a>
          </div>
        </div>

        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('message') }}
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
          @foreach($sales as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->created_at }}</td>
            <td>
              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteSalesModal{{ $data->id }}">
                <i class="fas fa-trash"></i>
                Delete
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <!-- Sales Modal Delete -->
      @foreach($sales as $data)
      <div class="modal fade" id="deleteSalesModal{{ $data->id }}" tabindex="-1" aria-labelledby="deleteSalesModal{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="deleteSalesModal{{ $data->id }}">Hapus Data Sales</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  <i class="fas fa-times"></i>
                </span>
              </button>
            </div>
            <div class="modal-body">
              Apakah Anda yakin ingin menghapus data sales <strong>{{ $data->name }}</strong>?
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">
                <i class="fas fa-times"></i>
                Batal
              </button>
              <form action="{{ route('sales.delete', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                  <i class="fas fa-trash"></i>
                  Hapus
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection