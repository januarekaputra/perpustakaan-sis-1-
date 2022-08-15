@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Print Loan Report</h1>
    </div>

    <a href="{{ route('print') }}" target="_blank" class="btn btn-sm btn-danger shadow-sm">
      <i class="fas fa-file-pdf text-white-50"></i> Print All Data
    </a>

    <hr>

    <div class="row">
      <div class="card-body">
        
          <div class="form-group mb-3">
            <label for="label">Date</label>
            <input type="date" class="form-control" name="start_date">
          </div>
          <div class="form-group mb-3">
            <label for="label">Until</label>
            <input type="date" class="form-control" name="end_date">
          </div>
          <div class="input-group mb-3">
            <a href="" onclick="this.href='/printperdate/'+ document.getElementById('start_date').value + '/' + document.getElementById('end_date').value " target="_blank" class="btn btn-sm btn-info shadow-sm">
              <i class="fas fa-print text-white-50"></i> PRINT
            </a>
          </div>
        </form>


      </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
{{-- <form action="{{ route('print') }}" method="GET"> --}}