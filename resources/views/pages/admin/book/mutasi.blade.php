@extends('layouts.admin')

@section('content')
  <div class="container-fluid">
    <h2 class="fs-3 text-center my-3">Book Mutation</h2>
      <div class="my-2">
          <form action="{{ route('mutasi') }}" method="GET">
              <div class="input-group mb-3">
                  <input type="date" class="form-control" name="start_date">
                  <input type="date" class="form-control" name="end_date">
                  <button class="btn btn-primary" type="submit">GET</button>
              </div>
          </form>
      </div>
    <div class="row">
      
      @foreach ($items as $item)
      <div class="col-5">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="{{ Storage::url($item->book->image) }}" class="img-fluid rounded-start" alt="image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><b>{{ $item->book->judul }} ({{ $item->tgl_pinjam }})</b></h5>
                @if($item->keadaan == 'Sedang diproses' || $item->keadaan == 'Dipinjam')
                <label class="badge badge-danger">On loan</label>
                @else
                <label class="badge badge-success">It's been returned</label> <p class="card-text"><small class="text-muted">On {{ $tgl_kembali }}</small></p>

                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection