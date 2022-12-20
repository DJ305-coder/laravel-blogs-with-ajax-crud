<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Home</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
      <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/bootstrap/bootstrap.min.css')}}">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
      <script src="{{URL::asset('admin_panel/commonarea/plugins/bootstrap/bootstrap.bundle.min.js')}}"></script>

      <!-- validation JS -->
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

      <!-- DATE PICKER -->
      <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
      <script src="{{URL::asset('admin_panel/commonarea/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

      <link rel="stylesheet" href="{{asset('admin_panel/toastr/jquery.toast.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin_panel/toastr/toastr.css')}}">

      <link rel="stylesheet" href="{{asset('front/index.css')}}">

      <script src="{{asset('admin_panel/toastr/jquery.toast.min.js')}}"></script>
      <script src="{{asset('admin_panel/toastr/toastr.js')}}"></script>
   
      
   </head>
   <body>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
               </li>
            </ul>
            
            <span class="navbar-text">
               @guest
                  <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#loginModal">Login</button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#registerModal">Register</button>  
               @endguest
               @auth
                  <a href="{{url('/user/dashboard')}}" target="_blank"><button type="button" class="btn btn-info">Dashboard</button></a>
               @endauth
            </span>
         </div>
      </nav>

      <!-- Blog heading -->
      <div class="d-flex mb-3 mt-3">
         <div class="mx-auto">
            <h1>Blogs</h1>
         </div>
      </div>
         
      <!-- filter and search  -->
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <form>
                  <div class="form-group col-xs-9">
                     <input class="form-control" type="text" id="search" placeholder="Search" />
                  </div>
               </form>
            </div>
            <div class="col-md-3">
               <form>
                  <div class="form-group">
                     <select class="form-control" id="order-filter">
                        <option value="desc" selected>Select Order</option>
                        <option value="desc">Latest</option>
                        <option value="asc">Oldest</option>
                     </select>
                  </div>
               </form>
            </div>
            <div class="col-md-3">
               <form>
                  <div class="form-group">
                  <div class="input-group">
                     <input type="text" class="form-control mydatepicker" autocomplete="off"  name="publish_date" id="datepicker" placeholder="Filter By Date"  autocomplete="off" value="" />
                     <span class="input-group-append"><span class="input-group-text">Date</span></span>
                  </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   
      <!-- Blog Section -->
      <div id="blogs_list">
         @include('blog_data')
      </div>

      <!-- Login modal -->
      <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header border-bottom-0">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="form-title mb-5 text-center">
                     <h3><strong>Login</strong></h3>
                  </div>
                  <div class="d-flex flex-column text-center">
                     <form action="{{route('user-login')}}" method="post" id="loginForm">
                        @csrf 
                        <div class="form-group">
                           <input type="email" class="form-control" id="login_email" name="email" placeholder="Enter email address.">
                        </div>
                        <div class="form-group">
                           <input type="password" class="form-control" id="login_password" name="password" placeholder="Your password">
                        </div>
                        <button type="submit"  class="btn btn-info btn-block btn-round">Login</button>
                     </form>
                  </div>
               </div>
               <div class="modal-footer d-flex justify-content-center">
                  <div class="signup-section">Not a member yet? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#registerModal" class="text-info">Register</a>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Register modal -->
      <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header border-bottom-0">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="form-title mb-5 text-center">
                     <h3><strong>Register</strong></h3>
                  </div>
                  <div class="d-flex flex-column text-center">
                     <form id="registerForm">
                        <div class="form-group">
                           <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                           <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                           <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                           <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter confirm password">
                        </div>
                        <button type="button" class="btn btn-info btn-block btn-round" id="registerBtn">Register</button>
                     </form>
                  </div>
               </div>
               <div class="modal-footer d-flex justify-content-center">
                  <div class="signup-section">Already register? <a href="#a" data-dismiss="modal"  data-toggle="modal" data-target="#loginModal" class="text-info"> Sign Up</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Blog detail Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel">Blog Detail</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="body-message">
                     <b>Date :</b> <span id="publishDate"></span><br>
                     <b >Blog By :</b> <span id="blogBy"></span>
                     <h5 id="blogTitle"></h5>
                     <img src="" alt="" id="blogImage" height="100px" width="100px">
                     <p id="blogDescription"></p>
                     
                  </div>
                  
                  <h5><strong>Comments :</strong></h5>
                  <div class="comment-container">
                     <strong>Datta Jadhav</strong>
                     <p>This is comment</p>

                     <strong>John Deo</strong>
                     <p>This is comment</p>
                     <form>
                           <div class="form-group">
                              <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
                              <input type="hidden" id="blog_id" value="" />
                           </div>
                           <div class="form-group">
                              @guest
                                 <button type="button" class="btn btn-success text-white"  onclick="alert('Please first login.')">Comment</button>
                              @endguest
                              @auth 
                                 <button type="button" class="btn btn-success text-white" id="commentBtn">Comment</button>
                              @endauth
                           </div>
                     </form>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>


   <!-- Search and filter with blogs-->

   <script>
      $('#datepicker').datepicker({
         weekStart: 1,
         autoclose: true,
         todayHighlight: true,
      })
   </script>   

   <script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          getMoreBlogs(page);
        });
        $('#search').on('keyup', function() {
          $value = $(this).val();
          getMoreBlogs(1);
        });

        $('#order-filter').on('change', function() {
          getMoreBlogs();
        });

        $("#datepicker").on('change', function(event) {
            event.preventDefault();
            getMoreBlogs();
         });

    });
    function getMoreBlogs(page) {
      var search = $('#search').val();
      var order = $("#order-filter option:selected").val();
      var date = $('#datepicker').val();
      $.ajax({
        type: "GET",
        data: {
          'search_query':search,
          'order' : order,
          'date' : date,
        },
        url: "{{ url('/') }}" + "?page=" + page,
        success:function(data) {
          $('#blogs_list').html(data);
        }
      });
    }
   </script>

   <!-- get blog detail -->
   <script>
      $(document).on('click','.view-blog', function(){
            const blog_id = $(this).data('id');
            $('#blog_id').val('');
            $.ajax({
               type: 'GET',
               headers: {
                  "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
               },
               url: "blog-detail/" + blog_id,
               success: function (data) {
                     console.log(data);
                     
                     $('#blogTitle').text(data.blog_title);
                     $('#blogImage').attr('src',data.blog_image);
                     $('#blogDescription').text(data.blog_description);
                     $('#blogDescription').text(data.blog_description);
                     $('#publishDate').text(data.publish_date);
                     $('#blog_id').val(data.id);
                     var name = '';
                     jQuery.isEmptyObject(data.user) ? name = 'Admin' : name = data.user.name ;
                     $('#blogBy').text(name);
                  },
               });
            })
   </script>

   <!-- Login validation  -->
   <script>
      $(document).ready(function () {
         $("#loginForm").validate({
            rules: {
                  email: {
                     required: true,
                     email : true,
                  },
                  password: {
                     required: true,
                  },
            },
            messages: {
                  email: {
                     required: "* Please enter email.",
                     email : "* Please enter valid email.",
                  },
                  password: {
                     required: "* Please enter password",
                  },
            },
               submitHandler: function (form) {
               $(".submit").attr("disabled", true);
               form.submit(); 
            },
         });
      });
   </script>

   <!-- Register validation  -->
   <script>
      $(document).ready(function () {
         $("#registerForm").validate({
               rules: {
                  name: {
                     required: true,
                  },
                  email: {
                     required: true,
                     email : true,
                  },
                  password: {
                     required: true,
                     minlength: 5,
                  },
                  confirm_password: {
                     minlength: 5,
                     equalTo: "#password"
                  }
               },
               messages: {
                  name: {
                     required: "* Please enter name.",
                  },
                  email: {
                     required: "* Please enter email.",
                  },
                  password: {
                     required: "* Please enter password.",
                  },
                  
               },
         });
      });
   </script>

   <!-- Register Form Submit -->
   <script>
      $(function () {    
         $('#registerBtn').on('click', (e) => {
               e.preventDefault();
               if ($("#registerForm").valid()) {
                  var formData = new FormData();

                  let name = $("#name").val();
                  let email = $("#email").val();
                  let password = $("#password").val();
                  let confirm_password = $("#confirm_password").val();

                  formData.append('name', name);
                  formData.append('email', email);
                  formData.append('password', password);
                  formData.append('confirm_password', confirm_password);
                  
                  $.ajax({
                     url: "{{route('user-register')}}",
                     type: 'POST',
                     contentType: 'multipart/form-data',
                     headers: {
                           "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                     },
                     cache: false,
                     contentType: false,
                     processData: false,
                     data: formData,
                     success: (response) => {
                        console.log(response);
                        if(response.status == 200){
                           $.toast({
                              heading: 'Success',
                              text: response.message,
                              icon: 'success',
                              loader: true, // Change it to false to disable loader
                              loaderBg: '#9EC600', // To change the background,
                              position: "bottom-right"
                           });
                           $('#registerModal').modal('hide');
                        }
                     },
                     error: (response) => {
                           console.log(response);
                     }
                  });
               }
         });
      });
   </script>
   
   <!-- comment add  -->
   <script>
      $(document).on('click', '#commentBtn', function(){
         alert('comment');
      })
   </script>
   </body>
</html>