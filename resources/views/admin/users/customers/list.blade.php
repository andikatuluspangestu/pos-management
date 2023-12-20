@extends('layouts.app')

@section('content')
    <div class="container-fluid px-5">
        <div class="row">
            <div class="table-responsive shadow-sm p-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    {{-- Add Data --}}
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#addCustomersModal">
                                <i class="fas fa-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                    </div>


                    @if (session('message'))
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
                            <th>Nama Customers</th>
                            <th>Email</th>
                            <th>Register</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    <!-- Detail Modal Button -->
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                        data-target="#detailCustomersModal{{ $data->id }}">
                                        <i class="fas fa-info"></i>
                                        Detail
                                    </button>
                                    {{-- Edit Modal Button --}}
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#editCustomersModal{{ $data->id }}">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    {{-- Delete Modal Button --}}
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#deleteCustomersModal{{ $data->id }}">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Customers Modal Delete -->
                @foreach ($customers as $data)
                    <div class="modal fade" id="deleteCustomersModal{{ $data->id }}" tabindex="-1"
                        aria-labelledby="deleteCustomersModal{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-danger" id="deleteCustomersModal{{ $data->id }}">Hapus
                                        Data Sales</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="fas fa-times"></i>
                                        </span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus data customers <strong>{{ $data->name }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                        <i class="fas fa-times"></i>
                                        Batal
                                    </button>
                                    <form action="{{ route('customers.delete', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                            Hapus Data
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End Customers Modal Delete -->

                <!-- Customers Modal Edit -->
                @foreach ($customers as $data)
                    <div class="modal fade" id="editCustomersModal{{ $data->id }}" tabindex="-1"
                        aria-labelledby="editCustomersModal{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-warning" id="editCustomersModal{{ $data->id }}">Edit
                                        Data Sales</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="fas fa-times"></i>
                                        </span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Add your form elements for editing here -->
                                    <form action="{{ route('sales.update', $data->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="name">Nama Sales:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $data->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $data->email }}">
                                        </div>

                                        <!-- Add other fields as needed -->

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                                <i class="fas fa-times"></i>
                                                Batal
                                            </button>
                                            <button type="submit" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                                Simpan Perubahan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End Customers Modal Edit -->

                <!-- Customers Modal Detail -->
                @foreach ($customers as $data)
                    <div class="modal fade" id="detailCustomersModal{{ $data->id }}" tabindex="-1"
                        aria-labelledby="detailCustomersModal{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-info" id="detailCustomersModal{{ $data->id }}">Detail
                                        Data Sales</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="fas fa-times"></i>
                                        </span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <tr>
                                            <th>Nama Sales</th>
                                            <td>{{ $data->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $data->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Register</th>
                                            <td>
                                                {{ $data->created_at->format('D, d-m-Y H:i:s') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Telepon</th>
                                            <td>{{ $data->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $data->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kota/Kabupaten</th>
                                            <td>{{ $data->city }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kode Pos</th>
                                            <td>{{ $data->postal_code }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                        <i class="fas fa-times"></i>
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End Customers Modal Detail -->

                <!-- Customers Modal Add Data -->
                <div class="modal fade" id="addCustomersModal" tabindex="-1" aria-labelledby="addCustomersModal"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-success" id="addCustomersModal">Tambah Data Customers</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Add your form elements for adding data here -->
                                <form action="{{ route('customers.insert') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name" placeholder="Masukkan Nama Sales"
                                                    value="{{ old('name') }}">
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
                                                <input type="text" name="city" id="city" class="form-control"
                                                    placeholder="Masukkan Kota/Kabupaten Domisili">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="postal_code">Kode POS</label>
                                            <input type="number" name="postal_code" id="postal_code"
                                                class="form-control" placeholder="Masukan Kode POS">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" placeholder="Masukkan Email Sales"
                                                    value="{{ old('email') }}"
                                                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="phone">Nomor Telepon</label>
                                                <input type="tel" name="phone" id="phone"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    placeholder="Masukkan Nomor Telepon" value="{{ old('phone') }}"
                                                    required>
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
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                            <i class="fas fa-times"></i>
                                            Batal
                                        </button>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-plus"></i>
                                            Tambah Data
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Customers Modal Add Data -->
            </div>
        </div>
    </div>
@endsection
