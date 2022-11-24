<!--INCUDING DATABASE TO THE TABLE-->
<?php

// Include database file
include 'database.php';

$profileObj = new database();

// Edit profile record
if(isset($_GET['editId']) && !empty($_GET['editId'])) {
  $editId = $_GET['editId'];
  $profile = $profileObj->displyaRecordById($editId);
}

// Update Record in profile table
if(isset($_POST['update'])) {
  $profileObj->updateRecord($_POST);
}

?>
<!--ADDING HTML TO WEB PAGE OR BUILDING WEB PAGE-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD With PDO</title>
  <meta name="description" content="This week we will be building a CREATE and READ CRUD system with PDO">
  <meta name="robots" content="noindex, nofollow">
  <!--  Add our Google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Bree+Serif&family=Courgette&family=Dancing+Script:wght@500&family=Noto+Sans+Mono&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
  <!--  Add our Bootstrap  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--  Add our custom CSS  -->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
<!--NAV BAR -->
<section>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Profile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=index.php>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=add.php>Add</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

</section>
<!--HEADER OF THE WEB PAGE-->
<header >
    <h1>Edit Student Details</h1>
</header>
<!--editing the viewer profile -->
  <section class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card">
          <div class="card-header text-center guju1 ">
          <h4 class="text-dark ">Update Records</h4>
          </div>
          <div class="card-body bg-light guju">
            <form action="edit.php" method="POST">
                <div class="form-group">
                    <label for="stuid">Username</label>
                    <input type="text" class="form-control" name="uusername" value="<?php echo $profile['username']; ?>" required="">
                </div>
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="uname" value="<?php echo $profile['name']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="uemail" value="<?php echo $profile['email']; ?>" required="">
              </div>
                <div class="form-group">
                    <label for="subject">Profession</label>
                    <input type="text" class="form-control" name="uprofession" value="<?php echo $profile['profession']; ?>" required="">
                </div>
              <div class="form-group">
                <label for="plag">address</label>
                <input type="text" class="form-control" name="uaddress" value="<?php echo $profile['address']; ?>" required="">
              </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" name="uphone" value="<?php echo $profile['phone']; ?>" required="">
                </div>
                <div class="form-group">
                    <label for="name">Mobile</label>
                    <input type="text" class="form-control" name="uname" value="<?php echo $profile['mobile']; ?>" required="">
                </div>
              <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $profile['id']; ?>">
                <input type="submit" name="update" class="btn btn-primary" style="..." value="Update">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

<!--footer-->
<footer class="bg-dark text-center text-light">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
                ></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
                ></a>

            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-google"></i
                ></a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
                ></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-linkedin-in"></i
                ></a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-github"></i
                ></a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="#">Georgian College</a>
    </div>
    <!-- Copyright -->
</footer>

</body>
</html>