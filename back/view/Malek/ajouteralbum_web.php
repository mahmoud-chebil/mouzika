<?php
include_once "../loginadmin/session.php";
	include_once '../../model/albums.php';
	include_once '../../controller/albumsC.php'; 

  
	$error = "";
	$album = null; 

 
if(isset($_POST['Confirmer']))
{
  $img = $_FILES['cover_image']['name'];
  $img_loc = $_FILES['cover_image']['tmp_name'];
  $img_folder = "images";
  move_uploaded_file($img_loc,"$img_folder/$img");
}

	$albumC = new albumsC();
	if (
		isset($_POST["id"]) &&
        isset($_POST["artist"]) && 
        isset($_POST["title"]) && 
        isset($_POST["number_of_songs"]) && 
        isset($_POST["length"]) &&  
        isset($_POST["genre"]) && 
        isset($_POST["release_date"]) 
	) {
		if (!empty($_POST["id"]) && 
            !empty($_POST["artist"]) &&
            !empty($_POST["title"]) &&
            !empty($_POST["number_of_songs"]) &&
            !empty($_POST["release_date"]) &&
            !empty($_POST["genre"]) &&
            !empty($_FILES["cover_image"]["name"]) &&
            !empty($_POST["length"]) 
		) {
			$album = new Album(
        
				$_POST['id'], 
                $_POST['artist'],
                $_POST['title'],
                $_POST['number_of_songs'],
                $_POST['release_date'],
                $_POST['length'],
                $_POST['genre'],
                'images/'.$_FILES['cover_image']['name']
			);
			$albumC->ajouteralbum($album);
			header('Location:http://localhost/mouzika_integ/back/view/Malek/albums_web.php');
            
		}
		else
			$error = "Missing information";
	}
 ?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mouzika | Ajouter un album</title>

  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- JS CONTROL -->
  <!-- <script defer src="../controll.js"></script> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <style>
      .error {
        color: red;
        padding-bottom: 1mm;
      }
      </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Mouzika Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Vous êtes connecté
              <br> en tant qu'admin.
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
     
           <?php  include "../sidebar.php"?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- 
  ***********************************************************************************************************************************
  ***********************************************************************************************************************************
  *********************************************************INTEGRATION HERE**********************************************************
  ***********************************************************************************************************************************
  ***********************************************************************************************************************************
-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ajout d'un album</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Votre nouvel album est:</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                   
                  </thead>
                  <tbody>
                  <div id="error">
		<?php echo $error; ?>
	</div>
  <p id="error12" class = "error"></p>
  <div>
  <div class="signup-form">
                    <form method="POST" class="register-form" id="form" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <div class="form-row">
                            <div class="form-group">
                            <div class="col-md-4">
                                <div class="form-input">
                                    <label for="id" class="required">ID album:</label>
                                    <input type="number" name="id" min="0" id="id" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <label for="artist" class="required">Artiste:</label>
                                    <input type="text" name="artist" id="artist" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <label for="title" class="required">Titre:</label>
                                    <input type="text" name="title" id="title" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <label for="genre" class="required">Genre:</label> 
                                    <input type="text" name="genre" id="genre" required/>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-7">
                                <div class="form-select">
                                    <div class="label-flex">
                                        <label for="number_of_songs">Nombre de chansons:</label>
                                        <input type="number"min="1" name="number_of_songs" id="number_of_songs" required><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <label for="release_date">Date de sortie:</label>
                                    <input type="date" name="release_date" id="release_date" min="01/01/1900" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <label for="length">Durée:</label>
                                    <input type="text"  name="length" id="length" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input">
                                    <label for="cover_image">Image:</label>
                                    <input type="file" name="cover_image" id="cover_image" class="submit"/>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-submit">
                        <style>
.submit {
  background-color: #f44336;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 8px;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
} </style> 
          
                            <input type="submit" value="Confirmer" class="submit" id="Confirmer" name="Confirmer"/> 
           
           
                            <input type="reset" value="Reset" class="submit" id="reset" name="reset" />
          
                        </div>
                      
                    </form>
                </div>
                </div>


                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    <!-- /.content -->
  </div>
    </section>
   
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & ../plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


  const validateForm = () => {

    let id = $('#id').val();
    let number_of_songs = $('#number_of_songs').val();
    let int_regex = /\d+/;

    let artist = $('#artist').val();
    let genre = $('#genre').val();
    let artist_and_genre_regex = /^[a-zA-Z ]{2,30}$/;

    let title = $('#title').val();
    let title_regex = /^[0-9a-zA-Z ]+$/;

    
    
    let release_date = $('#release_date').val();

    
    if (id === "") {
        alert("ID must be filled out");
        return false;
    }
 
    if (!artist_and_genre_regex.test(artist)) {
      if (artist === "") {
        alert("Artist name must be filled out");
        return false;
      }
      alert("You got a really messed up name bru..");
      return false;
    }

    if (!title_regex.test(title)) {
      if (title === "") {
        alert("title must be filled out");
        return false;
      }
      alert("If that's the type of music you listen to, you're in dire need of help");
      return false;
    }

    if (!artist_and_genre_regex.test(genre)) {
      if (genre === "") {
        alert("Genre must be filled out");
        return false;
      }
      alert("That's some weird music you got there");
      return false;
    }


    if (number_of_songs === "") {
      alert("number of songs must be filled out");
      return false;
    }

    if (release_date === "") {
      alert("release_date must be filled out");
      return false;
    }

    // if (!length_regex.test(length)) {
      if (length === "") {
        alert("length field must be filled out");
        return false;
      }
    //   alert("that's one long ass album");
    //   return false;
    // }

    // let dtToday = new Date();
    // if (release_date > dtToday){
    //   alert("You're not from the future asshole..");
    // }

    return true
  }

  $(function(){
      let dtToday = new Date();
      
      let month = dtToday.getMonth() + 1;
      let day = dtToday.getDate();
      let year = dtToday.getFullYear();
      if(month < 10)
          month = '0' + month.toString();
      if(day < 10)
          day = '0' + day.toString();
      
      let maxDate = year + '-' + month + '-' + day;
      $('#release_date').attr('max', maxDate);
  });

</script>
</body>
</html>