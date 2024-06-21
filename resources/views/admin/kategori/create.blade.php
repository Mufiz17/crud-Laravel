@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="mb-3">
                <div class="mb-5">
                    <a href="/kategori" class='btn btn-secondary'>back</a>
                </div>
                <form action='{{route('kategori.perform')}}' method="post">
                    @csrf
                    <div class="mb-3">
                      <label  class="form-label">Nama Kategori</label>
                      <input type="text" class="form-control" name='nama_kategori' value="{{old('nama_kategori')}}" autofocus>
                      <div class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
