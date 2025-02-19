@extends('layout.side') 
@section('content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Form Tambah Pengguna</h5>
        <div class="card">
          <div class="card-body">
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" @error('nama') is-invalid @enderror id="nama" placeholder="Nama" name="nama" value="{{ old('nama') }}">
                @error('nama') 
                <small class="text-danger">{{$message}}</small> 
                @enderror
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" @error('username') is-invalid @enderror id="username" placeholder="Username" name="username" value="{{ old('username') }}">
                @error('username') 
                <small class="text-danger">{{$message}}</small> 
                @enderror
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" @error('password') is-invalid @enderror id="password" placeholder="Password" name="password">
                  @error('password') 
                  <small class="text-danger">{{$message}}</small> 
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" class="form-control" @error('alamat') is-invalid @enderror id="alamat" placeholder="alamat" name="alamat" value="{{ old('alamat') }}">
                  @error('alamat') 
                  <small class="text-danger">{{$message}}</small> 
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="no_hp" class="form-label">No. Handphone</label>
                  <input type="text" class="form-control" @error('no_hp') is-invalid @enderror id="no_hp" placeholder="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                  @error('no_hp') 
                  <small class="text-danger">{{$message}}</small> 
                  @enderror
                </div>
              <div class="mb-3">
                <label class="form-label" for="level">Level</label>
                <select class="form-select"  @error('level') is-invalid @enderror name="level" id="level" placeholder="Level">
                    <option value="">Pilih Level</option>
                    @foreach($level as $item)
                    <option value="{{ $item }}" {{ old('level') == $item ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
                @error('level') 
                <small class="text-danger">{{$message}}</small> 
                @enderror
              </div>
              <a href="{{route('login')}}" class="btn btn-outline-primary">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> 
@endsection