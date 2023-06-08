<?php

$pdo = new PDO('mysql:localhost;port=3306;dbname=quiz_application', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Montserrat:ital@1&display=swap" rel="stylesheet">
</head>

<body>
    <div class="heading">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Hash_Quiz</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login | Take Quiz</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="leaderboard.php">Leaderboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="question_add.php">Add Question</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>

    <?php
    
    if (isset($_POST['submit'])) {
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $statement1 = $pdo->prepare("SELECT * FROM `user` WHERE email='$email'");
        $statement1->execute();
        $result = $statement1->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            $statement2 = $pdo->prepare("insert INTO user(email) values ('$email')");
            $statement2->execute();
        }

        header("location:test.php/?email=$email");
        if (!$email) {
            header('location:login.php');
?>
            <div class="alert alert-danger" role="alert">
                Email should be provided
            </div>
            <?php
            
        }
    }


    ?>

    <div class="form-input">
        <div class="form-lap">
            <form action="" method="post">
                <div class="email-input">
                    <label for="email" class="email-label" name="email">Email:</label>
                    <input type="email" class="emails" placeholder="Enter Your email here" name="email">
                </div>
                <div class="submit-lap">
                    <button type="submit" name="submit">Take Your quiz</button>
                </div>
            </form>
        </div>
    </div>










    <div class="footer">
        <p>this page is coded by hash</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>