@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Media Sosial</h1>
        <a href="{{ route('new_artikel') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-pen fa-sm text-white-50"></i> New Artikel </a>
    </div>

    <div class="row">


        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 p-2">
                <table width="100%" class=" table table-striped table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Judul Artikel</th>
                            <th>Karesidenan</th>
                            <th>Kabupaten / Kota</th>
                            <th>Isi Artikel</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikel as $item)


                        <tr>
                            <td><img src="{{ asset('images/artikel/foto_judul/'.$item->foto_judul) }}" class="w-50"
                                    alt=""></td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->karesidenan->nama }}</td>
                            <td>{{ $item->kota->nama }}</td>
                            <td><button class="btn-warning btn btn-sm" data-toggle="modal"
                                    data-target="#show-item-{{ $item->id }}">Show</button>
                                <div class="modal fade" id="show-item-{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body p-4">
                                                {!! $item->deskripsi !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </div>
            </td>
            <td>
                <div class="button-group">
                    <a href="/dashboard/artikel/{{ $item->id }}/edit"><button class="btn-success btn">Edit</button></a>
                    <button class="btn-danger btn btn-sm" data-toggle="modal" data-target="#delete-item">Delete</button>
                    <div class="modal fade" id="delete-item" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apa Anda Yakin
                                        Menghapus {{ $item->judul }} ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <div class="mb-2"></div>
                                        <div class="text-secondary">
                                            <small>
                                                Published: {{$item->created_at->format('d M,y')}}
                                            </small>
                                        </div>
                                    </div>
                                    <form action="/dashboard/artikel/{{ $item->id }}}/delete" method="post">
                                        @csrf
                                        @method('delete')

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Yes</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">No</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            </tr>
            @endforeach

            </tbody>
            </table>
        </div>
    </div>

</div>

</div>
<!-- /.container-fluid -->
@endsection
