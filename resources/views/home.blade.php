@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- <div class="row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Special title treatment</h5>
                                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Special title treatment</h5>
                                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                              </div>
                            </div>
                          </div> --}}
                        <div class="col-12">
                            <div class="mb-4 ">
                                <a href="/kategori" class="btn btn-primary">
                                    Kategori
                                </a>
                            </div>
                            <div class="mb-4">
                                <a href="/berita" class="btn btn-primary">
                                    Berita
                                </a>
                            </div>
                            <div class="mb-4">
                                <a href="/siswa" class="btn btn-primary">
                                    Siswa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
