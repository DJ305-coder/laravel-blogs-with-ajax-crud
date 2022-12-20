@extends('admin.layout.layout')
@section('header')
<style>
    .card .body-height {
        min-height: 260px;

    }
</style>

@endsection
@section('content')
<div class="content-body ">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-4 ">
                <h4 class="card-title blog-heading">Add Blog</h4>
                <div id="spinner"></div>
                <div class="card">
                    <div class="card-body body-height " style="min-height: 470px;">
                        <div class="basic-form">
                            <form id="blog_form" enctype="multipart/form-data">
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label>Blog Title</label>
                                            <input type="text" name="blog_title" id="blog_title" class="form-control">
                                        </div>
                                    </div>
                                    <input type="hidden" id="txtpkey" value="">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label>Blog Description</label>
                                            <textarea name="blog_description" id="blog_description" rows="6" class="form-control summernote"></textarea>
                                        </div>
                                        <label id="blog_description-error" class="error description-error" for="blog_description"></label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Publish Date</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control mydatepicker" autocomplete="off"  name="publish_date" id="datepicker" placeholder="mm/dd/yyyy"  autocomplete="off" value="" />
                                            <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                        </div>
                                        <label id="datepicker-error" class="error" for="datepicker"></label>
                                    </div>

                                    <div class="col-md-12 form-group ">
                                        <div class="upload_img">
                                            <div class="upload_photo mb-10">
                                                <label>Upload Blog Image</label>
                                                <input type="file" name="blog_image" id="blog_image" class="form-control preview" accept=".jpg,.png,.jpeg">
                                            </div>
                                            <div class="photo mt-2">
                                                <img class="file_logo_img  preview_image" src="{{asset('admin_panel/commonarea/dist/img/default.png')}}" alt="Image" width="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button class="btn btn-pad-submit btn-success m-b-30 m-t-15 f-s-14 p-l-20 p-r-20 m-r-10" type="button" id="blogSubmit">Submit</button>
                                            <button class="btn btn-pad-submit btn-danger m-b-30 m-t-15 f-s-14 p-l-20 p-r-20 m-r-10" type="button" id="formClear">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 no-padd-both">
                <h4 class="card-title">Banner List</h4>
                <div class="card">
                    <div class="card-body body-height " style="min-height: 470px;">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th width="5%">Sr No.</th>
                                        <th width="20%">Created At</th>
                                        <th width="20%">Blog Title</th>
                                        <th width="20%">Blog Image</th>
                                        <th width="15%">Blog By</th>
                                        <th width="25%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script>
    $(".s_meun").removeClass("active");
    $(".blogs_active").addClass("active");

    $('#datepicker').datepicker({
        weekStart: 1,
        autoclose: true,
        todayHighlight: true,
    })

    
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
        }).on('summernote.keyup', function() {
            var text = $(".summernote").summernote("code").replace(/&nbsp;|<\/?[^>]+(>|$)/g, "").trim();
            //alert(text);
            if (text.length == 0) {
                $('.description-error').show();
            } else {
                $('.description-error').hide();
            }
        });
    });

</script>

<!-- DataTable , Validation, Preview Image -->
<script>
    // image preview
    $(document).ready(() => {
        $(".preview").change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    console.log(event.target.result);
                    $(".preview_image").attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // DataTable
    $(function () {
        var table = $(".table").DataTable({
            processing: true,
            serverSide: true,
            ajax: "/admin/blog-data-table",
            columns: [
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                },
                {
                    data: "created_at",
                    name: "created_at",
                },
                {
                    data: "blog_title",
                    name: "blog_title",
                }, 
                {
                    data: "blog_image",
                    name: "blog_image",
                }, 
                {
                    data: "blog_by",
                    name: "blog_by",
                }, 
                
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
            ],
        });

    });

    // validations
    $(document).ready(function () {
        $("#blog_form").validate({
            ignore: ".note-editor *",
            debug: false,
            rules: {
                blog_title: {
                    required: true,
                },
                blog_description: {
                    required: true,
                },
                blog_image: {
                    required: function(){
                                return $('#txtpkey').val() !== '' ? false : true;
                            }
                },
                publish_date: {
                    required: true,
                },
            
            },
            messages: {
                blog_title: {
                    required: "* Please enter blog title.",
                },
                blog_description: {
                    required: "* Please enter blog description.",
                },
                blog_image: {
                    required: "* Please select blog image.",
                },
                publish_date: {
                    required: "* Please select publish date.",
                },
            },
        });
    });

</script>

 <!-- Add & Update blog  -->
<script>
    $(function () {    
        $('#blogSubmit').on('click', (e) => {
            e.preventDefault();
            if ($("#blog_form").valid()) {
                
                var formData = new FormData();

                let blog_title = $("#blog_title").val();
                let blog_id = $("#txtpkey").val();
                let blog_description = $("#blog_description").val();
                $("#datepicker").datepicker({ dateFormat: 'dd, mm, yy' });
                let publish_date = $("#datepicker").val();
                var blog_image = $('#blog_image').prop('files')[0];   

                jQuery.isEmptyObject(blog_image) ? console.log('input file empty') :  formData.append('blog_image', blog_image);   
                
                formData.append('blog_title', blog_title);
                formData.append('blog_description', blog_description);
                formData.append('publish_date', publish_date);
                formData.append('blog_id', blog_id);

                $.ajax({
                    url: "{{url('admin/blogs')}}",
                    type: 'POST',
                    contentType: 'multipart/form-data',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    beforeSend: function() {
                        $("#spinner").append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
                    },
                    success: (response) => {
                        console.log(response);
                        if(response.status == 200){
                            success_toast("Success", response.message);
                            $('#example').DataTable().ajax.reload();
                        }
                        $('#blog_form').trigger("reset");
                        $('#blogSubmit').text(' Submit');
                        $('.blog-heading').text(' Add Blog');
                        $('#blog_description').empty();
                        $('#txtpkey').val('');
                        $(".note-editable").html("");
                        $('.preview_image').attr('src', "{{asset('admin_panel/commonarea/dist/img/default.png')}}");
                        $("#spinner").hide();
                    },
                    error: (response) => {
                        console.log(response);
                    }
                });
            }
        });
    });
</script>

<!-- Edit blog -->
<script>
    $(document).on("click", ".EditBtn", function () {
        const blog_id = $(this).data("id");
        $.ajax({
            type: 'GET',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {blog_id: blog_id},
            url: "blogs/" + blog_id + "/edit",
            success: function (data) {
                console.log(data);
                $('#blog_title').val(data.blog_title);
                $(".note-editable").html(data.blog_description);
                $('#datepicker').val(data.publish_date);
                $('.preview_image').attr('src', data.blog_image);
                $('#txtpkey').val(data.id);
                $('#blogSubmit').text(' Update')
                $('.blog-heading').text(' Edit Blog');
            },
        });
    });
</script>

<!-- Delete blog -->
<script>
    $(document).on("click", ".DeleteBtn", function () {
        const blog_id = $(this).data("id")
        if (confirm("If you really want to delete blog ?")) {
            $.ajax({
                type: 'DELETE',
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {blog_id: blog_id},
                url: "blog/" + blog_id ,
                success: function (data) {
                    console.log(data);
                    if(data.status == 200){
                        success_toast("Success", data.message);
                        $('#example').DataTable().ajax.reload();
                    }
                },
            });
        }
    });
</script>

<!-- Form clear -->
<script>
    $(document).on('click', '#formClear', function(){
        $('#blog_form').trigger("reset");
        $('#blog_description').empty();
        $('#txtpkey').val('');
        $(".note-editable").html("");
        $('.preview_image').attr('src', "{{asset('admin_panel/commonarea/dist/img/default.png')}}");
    });
</script>
@endsection