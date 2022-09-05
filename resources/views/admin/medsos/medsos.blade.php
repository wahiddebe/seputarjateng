@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>

    <div class="row">


        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 p-2">
                <table width="100%" class=" table table-striped table-bordered table-hover" id="">
                    <thead>
                        <tr>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>Twitter</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medsos as $item)
                        <tr>
                            <td>{{ $item->facebook }}</td>
                            <td>{{ $item->instagram }}</td>
                            <td>{{ $item->twitter }}</td>
                            <td>
                                <div class="button-group">
                                    <a href="/medsos/{{ $item->id }}/edit"><button
                                            class="btn-success btn">Edit</button></a>
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
