@extends('layouts.app')

@section('content')
    <div class="container-fluid px-5" id="app-page">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm p-3">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Sales</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sales.insert') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            placeholder="Masukkan Nama Sales" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows="3"
                                            placeholder="Masukkan Alamat Lengkap">{{ old('address') }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-6">
                                {{-- City --}}
                                <div class="form-group">
                                  <label for="city">Kota</label>
                                  <input type="text" name="city" id="city" class="form-control" placeholder="Masukkan Kota/Kabupaten Domisili">
                                </div>
                              </div>
                              <div class="col-6">
                                <label for="postal_code">Kode POS</label>
                                <input type="number" name="postal_code" id="postal_code" class="form-control" placeholder="Masukan Kode POS">
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email ( <small>Contoh: email@example.com</small> )</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            placeholder="Masukkan Email Sales" value="{{ old('email') }}"
                                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phone">Nomor Telepon ( <small>Contoh: 0888xxxxx</small> )</label>
                                        <input type="tel" name="phone" id="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Masukkan Nomor Telepon" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Masukkan Password Sales">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                Simpan
                            </button>
                            <a href="{{ route('sales') }}" class="btn btn-danger">
                                <i class="fas fa-times"></i>
                                Batal
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
