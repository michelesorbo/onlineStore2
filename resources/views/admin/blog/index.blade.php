@extends('admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
      Create Blog
    </div>
    <div class="card-body">
      @if($errors->any())
      <ul class="alert alert-danger list-unstyled">
        @foreach($errors->all() as $error)
        <li>- {{ $error }}</li>
        @endforeach
      </ul>
      @endif

      <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col">
            <div class="mb-3 row">
              <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Titolo:</label>
              <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="titolo" value="{{ old('titolo') }}" type="text" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Corpo dell'articolo</label>
          <textarea class="form-control" name="corpo" rows="3">{{ old('corpo') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

<!-- Vista dei Prodotti in tabella -->
<div class="card">
  <div class="card-header">
    Manage Blogs - {{ $vale }} - {{ $francesco }} - {{ date("d-m-Y") }}
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Titolo</th>
          <th scope="col">Pubblicato il</th>
          <th scope="col">Ultima modifica</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["blogs"] as $blog)
        <tr>
          <td>{{ $blog->getId() }}</td>
          <td>{{ $blog->getTitolo() }}</td>
          <td>{{ $blog->getCreatedAt() }}</td>
          <td>{{ $blog->getUpdatedAt() }}</td>
          <td>
            <a class="btn btn-primary" href="{{ route('admin.blog.edit', ['id'=>$blog->getId()]) }}">
                <i class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.blog.delete', $blog->getId()) }}" method="post">
            @csrf
            @method('DELETE')
                <button class="btn btn-danger">
                    <i class="bi bi-trash3"></i>
                </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
