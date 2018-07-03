 @extends('admin.layout.index')

 @section('content')
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="rơ">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                @if(count($errors > 0))
                <div class="alert alert-danger">
                     @foreach($errors->all() as $err)
                     {{ $err }}
                     @endforeach
                </div>
                @endif

                @if(session('thongbaothem'))
                    <div class="alert alert-success">
                        {{ session('thongbaothem') }}
                    </div>
                @endif
                <form action="admin/tintuc/them" method="POST" enctype="multypart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name='theloai' id="theloai">
                            @foreach($theloai as $tl)
                            <option value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Tin</label>
                        <select class="form-control" name='loaitin' id="loaitin">
                            @foreach($loaitin as $lt)
                            <option value="{{ $lt->id }}">{{ $lt->Ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="tieude" placeholder="nhập vào tiêu đề" />
                    </div>
                    <div class="form-group">
                        <label>Tóm Tắt</label>
                        <textarea name="tomtat" id="demo" class="form-control ckeditor" row="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea name="noidung" id="demo" class="form-control ckeditor" row="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <input type="file" name="img">
                    </div>
                    <div class="form-group">
                        <label>Nổi Bật</label><br>
                        <label class="radio-inline">
                            <input value="1" type="radio" name="noibat" checked="checked">Có
                        </label>
                        <label class="radio-inline"> 
                            <input type="radio" name="noibat" value="0">Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm Tin Tức</button>
                    <button type="rết" class="btn btn-success">Làm Mới</button>
                    <form>
                    </div>
                </div>
                <!-- /.rơ -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection
        @section('script')
        <script>
            $(document).ready(function(){
                $("#theloai").change(function(){
                    var idtheloai = $(this).val();
                    $.get("index.php/admin/ajax/loaitin/"+idtheloai,function(data){
                        $("#loaitin").html(data);
                    });
                });
            });
        </script>
        @endsection