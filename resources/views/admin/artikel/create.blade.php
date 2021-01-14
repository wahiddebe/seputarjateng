@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <img src="" class="w-100" alt="">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Artikel</h1>


    </div>

    <div class="row">

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <form action="/dashboard/artikel/store" method="post" class="m-3" enctype="multipart/form-data"
                    class="m-3">
                    @csrf
                    <div class="form-group">
                        <label>Judul</label>
                        <input name="judul" value="" class="form-control" type="text" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <label>Foto Judul</label>
                        <input name="foto_judul" value="" class="form-control" type="file" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Karesidenan</label>
                        <select name="karesidenan" class="form-control" id="karesidenan">
                            <option disabled selected value="">-- Select Karesidenan --</option>
                            @foreach ($karesidenans as $karesidenan)
                            <option value="{{ $karesidenan->id }}">
                                {{ ucfirst($karesidenan->nama) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kota / Kabupaten</label>
                        <select name="kota" class="form-control" id="kota">

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control" id="kategori">
                            <option disabled selected value="">-- Select Kategori --</option>
                            @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">
                                {{ ucfirst($kategori->nama) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="ckeditor form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#karesidenan').on('change', function() {
            var karesidenanID = $(this).val();
            if(karesidenanID) {
                $.ajax({
                    url: '/dashboard/artikel/create/'+karesidenanID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        //console.log(data);
                      if(data){
                        $('#kota').empty();
                        $('#kota').focus;
                        $('#kota').append('<option disabled selected value="">-- Select Kota --</option>');
                        $.each(data, function(key, value){
                        $('select[name="kota"]').append('<option value="'+ value.id +'">' + value.nama+ '</option>');
                    });
                  }else{
                    $('#kota').empty();
                  }
                  }
                });
            }else{
              $('#kota').empty();
            }
        });
    });
</script>
<script type="text/javascript">
    CKEDITOR.replace('deskripsi', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
