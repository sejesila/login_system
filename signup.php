<?php
include_once 'header.php'
?>


<section class="vh-100 m" >
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                <?php
                                if (isset($_GET['error'])){
                                    if ($_GET['error'] == 'emptyInput'){
                                        echo "<p class='text-danger'> Fill in all fields</p>";
                                    }
                                    else if ($_GET['error'] == 'invaliduid'){
                                        echo "<p class='text-danger'> The username is invalid</p>";
                                    }
                                    else if ($_GET['error'] == 'invalidemail'){
                                        echo "<p class='text-danger'>Invalid email</p>";
                                    }
                                    else  if ($_GET['error'] == 'passwordmismatch'){
                                        echo "<p class='text-danger'>The passwords don't match</p>";
                                    }
                                    else  if ($_GET['error'] == 'stmtfailed'){
                                        echo "<p class='text-danger'> Something went wrong, try again</p>";
                                    }
                                    else if ($_GET['error'] == 'usernametaken'){
                                        echo "<p class='text-danger'> Username already taken</p>";
                                    }
                                    else if ($_GET['error'] == 'none'){
                                        echo "<p class='text-danger'> Account successfully created</p>";
                                    }
                                }
                                ?>

                                <form method="post" action="includes/signup.inc.php" class="mx-1 mx-md-4">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="name" placeholder="Name" class="form-control" />

                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" placeholder="Email" name="email" class="form-control" />

                                        </div>
                                    </div> <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="uid" placeholder="Username" class="form-control" />

                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="pwd" placeholder="Password" id="form3Example4c" class="form-control" />

                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="pwdrepeat" placeholder="Repeat your password" class="form-control" />

                                        </div>
                                    </div>



                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
                                    </div>

                                </form>





                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once 'footer.php'
?>