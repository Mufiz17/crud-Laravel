@extends('layouts.app')

@section('content')
    <div class="container">
        @session('success')
            <div class="alert alert-success alert-dismissible position-absolute bottom-0 end-0 me-3" role="alert">
                <div class="d-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    <div>
                        {{ session('success') }}
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endsession
        <div class="col-12">
            <div class="col-12 row">
                <div class="mb-4 col">
                    <a href="/" class="btn btn-secondary">
                        Back
                    </a>
                </div>
                <div class="mb-4 col d-flex justify-content-end">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_create">
                        Tambah
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th class="w-1">id</th>
                                <th>Judul Berita</th>
                                <th>Kategori Berita</th>
                                <th>Isi Berita</th>
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($berita as $item)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $item->judul_berita }}
                                    </td>
                                    <td>
                                        {{ $item->kategori->nama_kategori }}
                                    </td>
                                    <td>
                                        {{ $item->isi_berita }}
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modal_update{{ $item->id }}">
                                                        Edit
                                                    </a>
                                                    <button href="#" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Tidak ada Data
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Create Modal --}}
    <form action='{{ route('berita.perform') }}' method="POST">
        @csrf
        <div class="modal modal-blur fade" id="modal_create" tabindex="-1" role="dialog" aria-modal="false">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name='judul_berita' value="{{ old('judul_berita') }}"
                                autofocus>
                            @error('judul_berita')
                                <div class="text-danger mt-2"> {{ $message }} </div>
                            @enderror
                        </div>
                        <label class="form-label">Kategori</label>
                        <div class="form-selectgroup-boxes row mb-3">
                            @foreach ($kategori as $itemk)
                                <div class="col-lg-3">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="kategori_id" value="{{ $itemk->id }}"
                                            class="form-selectgroup-input" checked="">
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span
                                                    class="form-selectgroup-title strong mb-1">{{ $itemk->nama_kategori }}</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Berita</label>
                            <textarea type="text" class="form-control" name="isi_berita" autofocus>{{ old('isi_berita') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Update Modal --}}
    @foreach ($berita as $item)
        <form action='{{ route('berita.update', $item->id) }}' method="POST">
            @csrf
            @method('PUT')
            <div class="modal modal-blur fade" id="modal_update{{ $item->id }}" tabindex="-1" role="dialog"
                aria-modal="false">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul_berita"
                                    value="{{ $item->judul_berita }}" autofocus>
                                @error('judul_berita')
                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                @enderror
                            </div>
                            <label class="form-label">Kategori</label>
                            <div class="form-selectgroup-boxes row mb-3">
                                @foreach ($kategori as $itemk)
                                    <div class="col-lg-3">  
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="kategori_id" value="{{ $itemk->id }}"
                                                class="form-selectgroup-input"
                                                @if ($item->kategori_id == $itemk->id) checked @endif>
                                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                                <span class="me-3">
                                                    <span class="form-selectgroup-check"></span>
                                                </span>
                                                <span class="form-selectgroup-label-content">
                                                    <span
                                                        class="form-selectgroup-title strong mb-1">{{ $itemk->nama_kategori }}</span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Isi Berita</label>
                                <textarea type="text" class="form-control" name="isi_berita" autofocus>{{ $item->isi_berita }}</textarea>
                            </div>

                            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

    {{-- Danger Modal --}}
    @foreach ($berita as $item)
        <form action="{{ route('berita.delete', $item->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-status bg-danger"></div>
                        <div class="modal-body text-center py-4">
                            <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 9v4"></path>
                                <path
                                    d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z">
                                </path>
                                <path d="M12 16h.01"></path>
                            </svg>
                            <h3>Are you sure?</h3>
                            <div class="text-secondary">Do you really want to remove 84 files? What you've done cannot be
                                undone.</div>
                        </div>
                        <div class="modal-footer">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                            Cancel
                                        </a>
                                    </div>
                                    <div class="col">
                                        <button href="#" type="submit" class="btn btn-danger w-100"
                                            data-bs-dismiss="modal">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

    {{-- Success Modal --}}
    @foreach ($berita as $item)
    @endforeach

@endsection
