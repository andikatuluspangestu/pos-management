@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                Profil Saya
            </h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Profil</h6>
                    </div>
                    <div class="card-body">
                        <!-- Tampilkan notifikasi jika ada -->
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Tampilkan informasi user -->
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Nama:</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $user->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $user->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Telepon:</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ $user->phone }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Kata Sandi:</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah
                                            kata sandi.</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="address">Alamat:</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $user->address }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">Kota:</label>
                                        <input type="text" class="form-control" id="city" name="city"
                                            value="{{ $user->city }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="postal_code">Kode Pos:</label>
                                        <input type="text" class="form-control" id="postal_code" name="postal_code"
                                            value="{{ $user->postal_code }}" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
