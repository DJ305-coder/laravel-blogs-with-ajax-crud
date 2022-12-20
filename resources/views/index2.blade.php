<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Home</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/bootstrap/bootstrap.min.css')}}">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="{{URL::asset('admin_panel/commonarea/plugins/bootstrap/bootstrap.bundle.min.js')}}"></script>

      <!-- validation JS -->
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

      <link rel="stylesheet" href="{{asset('admin_panel/toastr/jquery.toast.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin_panel/toastr/toastr.css')}}">

      <script src="{{asset('admin_panel/toastr/jquery.toast.min.js')}}"></script>
      <script src="{{asset('admin_panel/toastr/toastr.js')}}"></script>
   
      <link rel="stylesheet" href="{{asset('front/index.css')}}">

   
   </head>
   <body>
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
               <ul class="nav navbar-nav">
              
               
               </ul>
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
      <!-- Blog section -->
      <div class="row">
         <div class="col-md-3">
            <div class="card">
                  <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/bologna-3.jpg" alt="Bologna">
                  <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                     <h4 class="card-title text-white">Bologna</h4>
                     <p class="card-text">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
                     <div class="link d-flex">
                     <a href="#" class="card-link text-warning">Read More</a>
                     </div>
                  </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="card">
                  <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/bologna-3.jpg" alt="Bologna">
                  <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                     <h4 class="card-title text-white">Bologna</h4>
                     <p class="card-text">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
                     <div class="link d-flex">
                     <a href="#" class="card-link text-warning">Read More</a>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      <div class="wrapper">
         <div class="container">
            <h1 class="title">Blogs</h1>
            <div class="row">
               <div class="col-sm-12">
               <div class="card bg-dark text-white">
                  <img class="card-img" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22780%22%20height%3D%22270%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20780%20270%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_185152c78a7%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_185152c78a7%22%3E%3Crect%20width%3D%22780%22%20height%3D%22270%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22290.234375%22%20y%3D%22152.4%22%3E780x270%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">
                  <div class="card-img-overlay">
                     <h5 class="card-title">Card title</h5>
                     <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                     <p class="card-text">Last updated 3 mins ago</p>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Login modal -->
      <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header border-bottom-0">
                  <button type="button" class="close-lg-btn" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="form-title text-center">
                     <h4>Login</h4>
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
                  <button type="button" class="close-lg-btn" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="form-title text-center">
                     <h4>Register</h4>
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
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 class="modal-title" id="myModalLabel">Blog Detail</h3>
               </div>
               <div class="modal-body">
                  <div class="body-message">
                     <b>Date :</b> <span id="publishDate"></span><br>
                     <b >Blog By :</b> <span id="blogBy"></span>
                     <h4 id="blogTitle"></h4>
                     <img src="" alt="" id="blogImage" height="100px" width="100px">
                     <p id="blogDescription"></p>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>

      <!-- get all blogs -->
      <!-- <script>
         $(document).ready(function(){
             $.ajax({
             type: 'GET',
             headers: {
                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
             },
             url: "all-blogs",
             success: function (data) {
                     for(var i=0; i<data.length; i++){
                        var name = '';

                        jQuery.isEmptyObject(data[i].user) ? name = 'Admin' : name = data[i].user.name ;

                         var img = '<div class="img-wrapper"><img src="'+data[i].blog_image+'" alt=""></div>';
                         var blog = '<div class="content"><b>Blog By : '+name+' </b><br><b> Date : '+data[i].publish_date+' </b><h1> '+data[i].blog_title+' </h1> <p> '+data[i].blog_description.substr(0, 105)+' </p></div>';
                         var viewBtn = '<div class="btn-wrapper"><button data-id='+data[i].id+' class="view-btn" data-toggle="modal" data-target="#myModal">View</button></div>';
                         var html = '<div class="card"><div class="inner-card">'+img+' '+blog+' '+viewBtn+' </div></div>';
                        
                         $('#blogCard').append(html);
                     }
                 },
             });
         })
      </script> -->

      <!-- get blog detail -->
      <!-- <script>
         $(document).on('click','.view-btn', function(){
             const blog_id = $(this).data('id');
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
                        var name = '';
                        jQuery.isEmptyObject(data.user) ? name = 'Admin' : name = data.user.name ;
                        $('#blogBy').text(name);
                     },
                 });
             })
      </script> -->

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
   </body>
</html>



<!-- <div class="wrapper">
   <div class="container">
      <h1 class="title">Blogs</h1>
      <div class="inner-wrapper" id="blogCard">
      </div>
   </div>
</div> -->