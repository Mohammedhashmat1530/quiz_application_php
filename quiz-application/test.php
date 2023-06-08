<?php

$pdo = new PDO('mysql:localhost;port=3306;dbname=quiz_application', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$limit = 1;
$statement = $pdo->prepare("SELECT * FROM ques_opt_ans ORDER BY RAND() LIMIT $limit");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Quiz</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Montserrat:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="test.css">
    <style>
        .navbar {
            background-color: #2C3639;
            height: 4rem;


        }

        body {
            background-color: #1B9C85;
        }

        .container {
            position: relative;
            top: 52px;
        }

        .quiz-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0.4px 0.4px 10px rgba(0, 0, 0, 0.5);
        }

        .question {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .option label {
            margin-bottom: 10px;
        }

        .dummy {
            position: relative;
            left: 356px;
        }
    </style>
</head>

<body>
    <div class="heading">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/quiz-application/index.php">Hash_Quiz</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="http://localhost/quiz-application/about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/quiz-application/login.php">Login | Take Quiz</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/quiz-application/leaderboard.php">Leaderboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="http://localhost/quiz-application/question_add.php">Add Question</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="quiz-container">
            <h1 class="text-center">Question Quiz</h1>




            <form id="myForm" method="POST" action="">
                <br>
                <?php
                foreach ($result as $i => $set) {

                ?>
                    <h4><?php echo "Question" . ($i + 1) ?></h4>

                    <div class="question">
                        <?php echo $set['question'] ?>
                    </div>
                    <div class="option">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answ" value="1" id="options">
                            <label class="form-check-label" for="option1">
                                <?php echo $set['option1'] ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answ" value="2" id="options">
                            <label class="form-check-label" for="option2">
                                <?php echo $set['option2'] ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answ" value="3" id="options">
                            <label class="form-check-label" for="option3">
                                <?php echo $set['option3'] ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answ" value="4" id="options">
                            <label class="form-check-label" for="option4">
                                <?php echo $set['option4'];
                                echo $set['answer'] ?>
                            </label>
                        </div>
                        <div class="dummy">
                            <input class="form-check-input" type="hidden" name="correct" value="<?php echo $set['answer'] ?>">
                        </div>


                        <?php
                        $email = $_GET['email'];
                        $statement2 = $pdo->prepare("SELECT score FROM `user` WHERE email='$email'");
                        $statement2->execute();
                        $result2 = $statement2->fetch(PDO::FETCH_ASSOC);
                        $score = $result2['score'];



                        if (isset($_POST['submit'])) {




                            $selected = $_POST['answ'];
                            $correct = $_POST['correct'];

                            if ($selected == $correct) {
                                $score++;


                                $statement3 = $pdo->prepare("UPDATE user SET score= $score WHERE email='$email'");
                                $statement3->execute();
                            } else {
                                $score--;
                                $statement4 = $pdo->prepare("UPDATE user SET score= $score WHERE email='$email'");
                                $statement4->execute();
                            }
                        }








                        ?>
                        <!-- <div class="form-check"> -->
                        <!-- <input class="form-check-input" type="text" id="ans" name="ans"> -->
                        <!-- </div> -->

                    </div>
                <?php



                }


                ?>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="button" onclick="clear()" class="btn btn-secondary">clear</button>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>


</html>