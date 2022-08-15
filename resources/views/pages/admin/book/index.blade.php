@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Books</h1>
        <a href="{{ route('book.create') }}" class="btn btn-sm btn-primary shadow-sm">
          <i class="fas fa-plus fa-sm text-white-50"></i> Add Book
        </a>
    </div>

    <a href="{{ route('mutasi') }}" class="btn btn-sm btn-info shadow-sm">
      <i class="fa-light fa-book-arrow-up"></i> Book Mutation
    </a>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
    @endif

      @if (session()->has('edit'))
        <div class="alert alert-warning" role="alert">
          {{ session('edit') }}
        </div>
      @endif

      @if (session()->has('delete'))
        <div class="alert alert-danger" role="alert">
          {{ session('delete') }}
        </div>
      @endif

    <div class="row">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>BOOK ID</th>
                  <th>TITLE</th>
                  <th>CATEGORY</th>
                  <th>STOCK</th>
                  <th>BOOKSHELF</th>
                  <th>IMAGE</th>
                  <th>ACTION</th>
                </tr>
            </thead>
              <tbody>
                @forelse ($items as $item)
                <tr>
                  <td>{{ $item->kode_buku }}</td>
                  <td>{{ $item->judul }}</td>
                  <td>{{ $item->category->nama_kategori }}</td>
                  <td>
                    @if ($item->jumlah <= 0)
                      OUT OF STOCK
                    @else 
                      {{ $item->jumlah }}
                    @endif
                    {{-- <a href="{{  $item->id  }}" class="btn mb-3 btn-warning btn-sm" data-toggle="modal" data-target="#insertModal{{ $item->id }}">
                      <span class="icon text-white-50">
                        <i class="fa fa-pencil-alt"></i>
                      </span>
                    </a> --}}
                    <!-- Button trigger modal -->
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Launch demo modal
                    </button> --}}

                  </td>
                  <td>{{ $item->rak}}</td>
                  <td>
                    <img src="{{ storage_path($item->image) }}" alt="image" style="width: 150px" class="img-thumbnail">
                  </td>
                  <td>
                    <a href="{{ route('book.show', $item->id) }}" class="btn btn-info">
                      <i class="fa fa-eye"></i>
                      
                    </a>
                    <a href="{{ route('book.edit', $item->id) }}" class="btn btn-warning">
                      <i class="fa fa-pencil-alt"></i>
                      
                    </a>
                    <form action="{{ route('book.destroy', $item->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete {{ $item->judul }}?')">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="7" class="text-center">
                    Data Not Available
                  </td>
                </tr>
                @endforelse
              </tbody>
          </table>
        </div>
      </div>
    </div>

</div>
<!-- /.container-fluid -->
<!-- /modal-->
{{-- <div class="modal fade" id="insertModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="insertModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertModal{{ $item->id }}">Update Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('book.update', $item->id) }}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="jumlah">Stock</label>
            <input id="jumlah" placeholder="Stock" class="form-control" value="{{ $item->jumlah }}" type="text" name="jumlah" required>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection