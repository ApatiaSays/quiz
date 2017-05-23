<?php
  session_start();
  require('db.php');
  
  $qCount = n;
  if ( ! isset($_SESSION['current_question']) )
  {
    $_SESSION['current_question'] = 0;
    $_SESSION['counter'] = 0;
  }

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
  {

    $questionIndex = array_keys($_POST)[0];

    if ( $quizz[$questionIndex]['correct_option'] == $_POST[$questionIndex] )
    {
      $_SESSION['counter'] = $_SESSION['counter'] + 1;
    }

    if ( $questionIndex == count($quizz) - 1 <= $qCount)
    {
      echo 'correct points ' . $_SESSION['counter'];
      die();
    }

    $_SESSION['current_question'] += 1;
  }

  $question = $quizz[$_SESSION['current_question']];
  $qIndex = $_SESSION['current_question'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <form action="" method="POST">

      <h4><?php echo $question['title'] ?></h4>
      <?php foreach ( $question['options'] as $oIndex => $option ) : ?>
      <p>
        <label>
          <input type="radio" name="<?= $qIndex ?>" value="<?= $oIndex ?>">
          <?= $option; ?>
        </label>
      </p>
      <?php endforeach; ?>

    <button type="submit">Submit</button>
  
  </form>
  
</body>
</html>