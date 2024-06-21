@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="mb-4">
                <div class="col-12 row">
                    <div class="mb-4 col">
                        <a href="/" class="btn btn-secondary">
                            Back
                        </a>
                    </div>
                    <div class="mb-4 col d-flex justify-content-end">
                        <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                            Tambah
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th class="w-1">id</th>
                                <th>Name</th>
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($kategori as $item)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $item->nama_kategori }}
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{ route('kategori.edit', $item->id) }}">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('kategori.delete', $item->id) }}" method='post'>
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
                                    <td colspan="3" class="text-center">
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
@endsection
