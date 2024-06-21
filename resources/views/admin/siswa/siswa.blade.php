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
                <div class="col-12">
            </div>
            @endsession
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
                                <th>Name</th>
                                <th>kelas</th>
                                <th>domisili</th>
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($siswa as $item)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $item->nama_siswa }}
                                    </td>
                                    <td>
                                        {{ $item->kelas_siswa }}
                                    </td>
                                    <td>
                                        {{ $item->domisili_siswa }}
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
                                                    <form action="{{ route('siswa.delete', $item->id) }}" method='post'>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Apakah Anda yakin?')"
                                                            class="dropdown-item">
                                                            Delete
                                                        </button>
                                                    </form>
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
    <form action='{{ route('siswa.perform') }}' method="POST">
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
                            <label class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa" autofocus>
                            @error('nama_siswa')
                                <div class="text-danger mt-2"> {{ $message }} </div>
                            @enderror
                        </div>
                        <label class="form-label">Kelas Siswa</label>
                        <div class="form-selectgroup-boxes row mb-3">
                            <div class="col-lg-3">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="kelas_siswa" value="10" class="form-selectgroup-input"
                                        checked="">
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Kelas 10</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="kelas_siswa" value="11" class="form-selectgroup-input"
                                        checked="">
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Kelas 11</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="kelas_siswa" value="12" class="form-selectgroup-input"
                                        checked="">
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Kelas 12</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="kelas_siswa" value="13"
                                        class="form-selectgroup-input" checked="">
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Kelas 13</span>
                                        </span>
                                    </span>
                                </label>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Domisili Siswa</label>
                            <input type="text" class="form-control" name="domisili_siswa" autofocus>
                        </div>
                        {{-- <div class="row">
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label">Report url</label>
                                    <div class="input-group input-group-flat">
                                        <span class="input-group-text">
                                            https://tabler.io/reports/
                                        </span>
                                        <input type="text" class="form-control ps-0" value="report-01"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Visibility</label>
                                    <select class="form-select">
                                        <option value="1" selected="">Private</option>
                                        <option value="2">Public</option>
                                        <option value="3">Hidden</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Client name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Reporting period</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">Additional information</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"> --}}
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Update Modal --}}
    @foreach ($siswa as $item)
        <form action='{{ route('siswa.update', $item->id) }}' method="POST">
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
                                <label class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa"
                                    value="{{ $item->nama_siswa }}" autofocus>
                            </div>
                            <label class="form-label">Kelas Siswa</label>
                            <div class="form-selectgroup-boxes row mb-3">
                                <div class="col-lg-3">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="kelas_siswa" value="10"
                                            class="form-selectgroup-input"
                                            @if ($item->kelas_siswa == 10) checked @endif>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Kelas 10</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="kelas_siswa" value="11"
                                            class="form-selectgroup-input"
                                            @if ($item->kelas_siswa == 11) checked @endif>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Kelas 11</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="kelas_siswa" value="12"
                                            class="form-selectgroup-input"
                                            @if ($item->kelas_siswa == 12) checked @endif>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Kelas 12</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="kelas_siswa" value="13"
                                            class="form-selectgroup-input"
                                            @if ($item->kelas_siswa == 13) checked @endif>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Kelas 13</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Domisili Siswa</label>
                                <input type="text" class="form-control" name="domisili_siswa"
                                    value="{{ $item->domisili_siswa }}" autofocus>
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
@endsection
