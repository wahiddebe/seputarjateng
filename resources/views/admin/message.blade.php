@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Media Sosial</h1>
    </div>

    <div class="row">


        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 p-2">
                <table width="100%" class=" table table-striped table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($message as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->subject }}</td>
                            <td>{{ $item->message }}</td>
                            <td>{{$item->created_at->format('d F,y')}}</td>
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
