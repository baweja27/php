<!--ADDING PHP-->
<!--DELETE PHP-->
<?php

//INCLUDE DATABASE
include 'database.php';
$profileObj = new database();
//  DELETE DATA FROM TABLE
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $profileObj->deleteRecord($deleteId);
}
?>
<!--STARTING HTML-->
<!DOCTYPE html>
<html lang="en">
<!--HEAD-->
<head>
    <!--      USING META TAGS-->
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


<!--  nav bar-->
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
<!--header of the page-->
<header >

    <h1>Profile Page</h1>

</header>
<!---->
<!--header ends-->


<!--main class starts-->
<main class="container">
    <!--      PHP-->
    <?php
    //    INSERT THE DATA TO TABLE ADD
    if (isset($_GET['msg1']) == "insert") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Profile Has Been Created
            </div>";
    }
    //      UPDATE DATA
    if (isset($_GET['msg2']) == "update") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Profile updated successfully
            </div>";
    }
    //      DELETE DATA
    if (isset($_GET['msg3']) == "delete") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Profile deleted successfully
            </div>";
    }
    ?>






    <!--      VIEW RECORD IN THE FORM OF profile cards-->
    <section class="bgimage">

        <div class="text-center"><h2 class="text-white record">View Profiles
            </h2></div>

<!--php to display profile cards-->
            <?php
            $profile = $profileObj->displayData();
            foreach ($profile as $profile) {
                ?>
                    <br>
<!--backgrounf color-->
                <section style="background-color: #eee;">
                    <div class="container py-5">
                        <div class="row">
                            <div class="col">
                                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">User</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                             class="rounded-circle img-fluid" style="width: 150px;">
                                        <h5 class="my-3"><?php echo $profile['name'] ?></h5>
                                        <p class="text-muted mb-1"><?php echo $profile['profession'] ?></p>
                                        <p class="text-muted mb-4"><?php echo $profile['address'] ?></p>
                                        <div class="d-flex justify-content-center mb-2">
                                            <button type="button" class="btn btn-primary">Follow</button>
                                            <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $profile['name'] ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $profile['email'] ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Phone</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $profile['phone'] ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Mobile</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $profile['mobile'] ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Address</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $profile['address'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



<!--update button to update the profile record-->
                <a href="edit.php?editId=<?php echo $profile['id'] ?>" ><button class="btn btn-primary">Update Profile<i class="fas fa-pencil"></i></button></a>
                <!--           DELETE BUTTON TO DELETE THE RECORD FROM TABLE-->
                <a href="index.php?deleteId=<?php echo $profile['id'] ?>" onclick="confirm('Are you sure want to delete this record')" ><button class="btn btn-danger">Delete Profile<i class="fas fa-trash"></i></button></a>
<br>
            <?php } ?>
<!--button to add new profile-->
        <a href="add.php" style="float:right;"><button class="btn btn-success">Create New Profile<i class="fas"></i></button></a>
        <br>
        <h5 class="text-white" >/To create new profile click create profile -->></h5>

        <br>

    </section>
</main>
<!--main part of the html ends-->

<!--  footer of the body-->


<!--empty lines to stick the footer at the bottom-->
<br>
<br>
<br>

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
