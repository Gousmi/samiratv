<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Eflyer</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/visitor//bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/visitor//style.css')}}">
      <!-- Ratings css -->
      <link rel="stylesheet" href="{{asset('css/visitor//ratings.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('css/visitor//responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('images/visitor//fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('css/visitor//jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('css/visitor//owl.carousel.min.css')}}">
      <link rel="stylesoeet" href="{{asset('css/visitor//owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main mb-3">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="#">Top Rated</a></li>
                           <li><a href="#">New Recipes</a></li>
                           <li><a href="#">Today's Selection</a></li>
                           <li><a href="#">Customer Service</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="index.html"><img src="{{asset('images/visitor//logo.png')}}"></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.html">Home</a>
                     <a href="fashion.html">Fashion</a>
                     <a href="electronic.html">Electronic</a>
                     <a href="jewellery.html">Jewellery</a>
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="{{asset('images/visitor//toggle-icon.png')}}"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                  </div>
                  <div class="main">
                     <!-- Search recipes form -->
                     <form action="" >
                        @csrf
                        <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search recipes" name="search" value="{{request('search')}}">
                           <div class="input-group-append">
                              <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                              <i class="fa fa-search"></i>
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="header_box">
                     <div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="{{asset('images/visitor//flag-uk.png')}}" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
                           <a href="#" class="dropdown-item">
                           <img src="{{asset('images/visitor//flag-france.png')}}" class="mr-2" alt="flag">
                           French
                           </a>
                        </div>
                     </div>
                     <div class="login_menu">
                        <ul>
                           <li><a href="{{route('admin.recipes.index')}}">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span>Admin</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
                  <!-- banner section start -->
                  <div class="banner_section layout_padding">
                    <div class="container">
                       <div id="my_slider" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                             <div class="carousel-item active">
                                <div class="row">
                                   <div class="col-sm-12">
                                      <h1 class="banner_taital">Discover <br>new recipes everyday</h1>
                                      <div class="buynow_bt"><a href="#">View Recipes</a></div>
                                   </div>
                                </div>
                             </div>
                             <div class="carousel-item">
                                <div class="row">
                                   <div class="col-sm-12">
                                      <h1 class="banner_taital">Discover <br>new recipes everyday</h1>
                                      <div class="buynow_bt"><a href="#">View Recipes</a></div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                          <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                          <i class="fa fa-angle-right"></i>
                          </a>
                       </div>
                    </div>
                 </div>
                 <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- Recipe section start -->
      <div class="card mx-3 my-3 " >
        <div class="row g-0">
          <div class="col-lg-5 px-4 py-2">
            <img src="{{$recipe->images[0]->path}}" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-lg-7">
            <div class="card-body">
              <h1 class="card-title fashion_taital">{{$recipe->name}}</h1>
              <p class="card-text">{!!$recipe->description!!}</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              <h2 class="mt-4">Rate this recipe :</h2>
              <form method="post" action="{{ route('visitor.rating.store') }}">
               @csrf
                  <div class="rating-css row">
                     <div class="star-icon col-lg-4">
                        <input type="radio" value="1" @if (floor($final_rating)==1)
                          checked @endif name="rating" id="rating1">
                        <label for="rating1" class="fa fa-star"></label>
                        <input type="radio" value="2" @if (floor($final_rating)==2)
                          checked @endif name="rating" id="rating2">
                        <label for="rating2" class="fa fa-star"></label>
                        <input type="radio" value="3" @if (floor($final_rating)==3)
                        checked @endif name="rating" id="rating3">
                        <label for="rating3" class="fa fa-star"></label>
                        <input type="radio" value="4" @if (floor($final_rating)==4)
                        checked @endif name="rating" id="rating4">
                        <label for="rating4" class="fa fa-star"></label>
                        <input type="radio"  value="5" @if (floor($final_rating)==5)
                        checked @endif name="rating" id="rating5">
                        <label for="rating5" class="fa fa-star"></label>
                        <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
                     </div>                    
                     <div class="col-lg-1">
                        <button type="submit" class="btn btn-lg btn-outline-rating">Submit</button>
                     </div>
                     <div class="col-lg-7">
                        <p>Rating :{{$final_rating}}</p>
                        <p>{{$rating_message}}</p>
                     </div>
                  </div>
               </form>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="card-body col-lg-12">
               <h2>Comments({{$comments_number}})</h2>
               @include('visitor.recipes.comments', ['comments' => $recipe->comments, 'recipe_id' => $recipe->id])
               <hr/>
               <h3>Leave a comment</h3>
               <form method="post" action="{{ route('visitor.comment.store') }}">
                  @csrf
                  <div class="form-group form-inline">
                     <label for="user_name">Name: </label><input type="text" id="user_name" name="user_name" class="form-control ml-2 mr-2 form-control-sm"/>
                     <label for="user_email">Email: </label><input type="text" id="user_email" name="user_email" class="form-control ml-2 mr-2 form-control-sm"/>
                  </div>
                  <div class="form-group"> 
                     <input type="text" name="comment" class="form-control" placeholder="Write your comment here"/>
                     <input type="hidden" name="recipe_id" value="{{ $recipe->id }}" />
                  </div>
                  <div class="form-group">
                     <input type="submit" class="btn btn-sm btn-outline-warning py-0" style="font-size: 0.8em;" value="Send" />
                  </div>
            </div>
        </div>
      </div>
      <!-- Recipe section end -->     
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="{{asset('images/visitor//footer-logo.png')}}"></a></div>
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
               <ul>
                  <li><a href="#">Best Sellers</a></li>
                  <li><a href="#">Gift Ideas</a></li>
                  <li><a href="#">New Releases</a></li>
                  <li><a href="#">Today's Deals</a></li>
                  <li><a href="#">Customer Service</a></li>
               </ul>
            </div>
            <div class="location_main">Help Line  Number : <a href="#">+1 1800 1200 1200</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{asset('js/visitor/jquery.min.js')}}"></script>
      <script src="{{asset('js/visitor/popper.min.js')}}"></script>
      <script src="{{asset('js/visitor/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('js/visitor/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('js/visitor/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('js/visitor/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('js/visitor/custom.js')}}"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>