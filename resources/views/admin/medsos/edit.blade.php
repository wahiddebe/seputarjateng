@extends('layouts.admin.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Media Sosial</h1>
    </div>



    <!-- Content Row -->

    <div class="row">


        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <form action="/medsos/{{ $medsos->id }}/edit" method="post" class="m-3" enctype="multipart/form-data"
                    class="m-3">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Facebook</label>
                        <input name="facebook" value="{{ $medsos->facebook }}" class="form-control" type="text"
                            placeholder="Facebook">
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input name="instagram" value="{{ $medsos->instagram }}" class="form-control" type="text"
                            placeholder="Instagram">
                    </div>
                    <div class="form-group">
                        <label>Twitter</label>
                        <input name="twitter" value="{{ $medsos->twitter }}" class="form-control" type="text"
                            placeholder="Twitter">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


</div>


@endsection
