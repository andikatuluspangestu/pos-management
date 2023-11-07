@extends('layouts.app')

@section('content')
<div class="container">
  <h1>
    Selamat Datang, {{ Auth::user()->name }}
  </h1>
  <h1 class="badge badge-primary">
  Anda login sebagai <strong>{{ Auth::user()->level }}</strong>
  </h1>
</div>
@endsection

