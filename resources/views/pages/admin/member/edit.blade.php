@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit {{ $item->nama_anggota }}</h1>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="card shadow">
      <div class="card-body">
        <form action="{{ route('member.update', $item->no_anggota) }}" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group" hidden="true">
            <label for="no_anggota">ID</label>
            <input id="no_anggota" class="form-control" value="{{ $item->no_anggota }}" type="text" name="no_anggota" readonly>
          </div>
          <div class="form-group">
            <label for="nama_anggota">Name</label>
            <input id="nama_anggota" placeholder="Name" class="form-control" value="{{ $item->nama_anggota }}" type="text" name="nama_anggota" required>
          </div>
          
          <div class="form-group">
            <label for="jen_kel" class="form-label">Gender</label>
            <div class="form-check">
              <label class="form-check-label" for="jen_kel">
                <input type="radio" name="jen_kel" value="Laki-Laki" id="jen_kel" {{$item->jen_kel == 'Laki-Laki'? 'checked' : ''}} required> Male
                <input type="radio" name="jen_kel" value="Perempuan" id="jen_kel" {{$item->jen_kel == 'Perempuan'? 'checked' : ''}} required> Female
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="status" class="form-label">Status</label>
            <div class="form-check">
              <label class="form-check-label" for="status">
                <input type="radio" name="status" value="Guru" id="status" {{$item->status == 'Guru'? 'checked' : ''}} required> Teacher
                <input type="radio" name="status" value="Siswa" id="status" {{$item->status == 'Siswa'? 'checked' : ''}} required> Student
                <input type="radio" name="status" value="Staff" id="status" {{$item->status == 'Staff'? 'checked' : ''}} required> Staff
              </label>
            </div>
          </div>
          
          <div class="form-group">
            <label for="kelas" class="form-label">Grade</label>
            <div class="form-check">
              <label class="form-check-label" for="kelas">
                <input type="radio" name="kelas" value="TK" id="kelas" {{$item->kelas == 'TK'? 'checked' : ''}}> Kindergarten
                <input type="radio" name="kelas" value="SD" id="kelas" {{$item->kelas == 'SD'? 'checked' : ''}}> Primary School
                <input type="radio" name="kelas" value="SMP" id="kelas" {{$item->kelas == 'SMP'? 'checked' : ''}}> Junior High School
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="no_telp">Phone Number</label>
            <input id="no_telp" placeholder="Phone Number" class="form-control" value="{{ $item->no_telp }}" type="number" name="no_telp" required>
          </div>
          <button type="submit" class="btn btn-warning btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-check"></i>
            </span>
            <span class="text">Update</span>
          </button>
        </form>
      </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection