
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SamiraTV</title>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{Route('visitor.recipes.index')}}" class="nav-link">Visitor Homepage</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Admin Pannel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column"  role="menu">
          <li class="nav-item">
            <a href="{{route('admin.recipes.index')}}" class="nav-link">
              <i class="nav-icon fas fa-pizza-slice"></i>
              <p>
                Recipes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.tags.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Tags
              </p>
            </a>
          </li>
                     <!-- old treeview 
                             <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="{{route('admin.recipes.create')}}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Add new recipe</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{route('admin.recipes.index')}}" class="nav-link">
                                    <i class="fas fa-pen nav-icon"></i>
                                    <p>Update recipe</p>
                                  </a>
                                </li>
                              </ul>  
                             -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Alert message after creating/deleting/updating recipe -->
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
          {{ session()->get('message') }} 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif
    @if (session()->has('warning'))
        <div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
          {{ session()->get('warning') }} 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif
    <!-- Main content -->
    <div class="content">

      @yield('content')

    </div>
    <!-- /.content-wrapper -->

</div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

<!-- AdminLTE App -->
<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" integrity="sha512-YibiFIKqwi6sZFfPm5HNHQYemJwFbyyYHjrr3UT+VobMt/YBo1kBxgui5RWc4C3B4RJMYCdCAJkbXHt+irKfSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('scripts')
</body>
</html>
