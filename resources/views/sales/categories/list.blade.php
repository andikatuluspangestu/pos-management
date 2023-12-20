@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Kategori</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $category)
          <tr>
            <td>{{ $category->category_id }}</td>
            <td>{{ $category->category_name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection