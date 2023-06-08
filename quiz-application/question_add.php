<?php

$pdo = new PDO('mysql:localhost;port=3306;dbname=quiz_application', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
    if(isset($_POST['submit'])){
        $ques=$_POST['question'];
        $op1=$_POST['option1'];
        $op2=$_POST['option2'];
        $op3=$_POST['option3'];
        $op4=$_POST['option4'];
        $ans=$_POST['ans'];

        $statement=$pdo->prepare("INSERT INTO `ques_opt_ans`( `question`, `option1`, `option2`, `option3`, `option4`, `ans`) VALUES ('$ques','$op1','$op2','$op3','$op4','$ans')");
        $statement->execute();
    }
    ?>
   
    




    <div class="question-div-lap">
        <h3>Add a question</h3>
        <div class="ques-lap">
            <form action="" method="post">
                <div class="ques-para">
                    <div class="ques-input">
                        <label for="que"  >Question</label>
                        <br>
                        <input type="text" placeholder="Enter Your Question" name="question"  required>

                    </div>
                    <div class="ques-input">
                        <label for="op1">option 1</label>
                        <br>
                        <input type="text" placeholder="Enter Your option 1" name="option1"  required>
                    </div>
                    <div class="ques-input">
                        <label for="op2">option 2</label>
                        <br>
                        <input type="text" placeholder="Enter Your option 2" name="option2"  required>

                    </div>
                    <div class="ques-input">
                        <label for="op3">option 3</label>
                        <br>
                        <input type="text" placeholder="Enter Your option 3" name="option3"  required>

                    </div>
                    <div class="ques-input">
                        <label for="op4">option 4</label>
                        <br>
                        <input type="text" placeholder="Enter Your option 4" name="option4" required>

                    </div>

                    <div class="ques-input">
                        <label for="sol">Solution</label>
                        <br>
                        <select name="ans"  id="ans"  required>
                            <option value="1" >Option 1</option>
                            <option value="2" >Option 2</option>
                            <option value="3" >Option 3</option>
                            <option value="4" >Option 4</option>
                        </select>
                    </div>
                    <br>
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