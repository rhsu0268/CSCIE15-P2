<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>xkcd Password Generator</title>
    <?php require 'controller.php'; ?>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
       
       
       
        <h3 class="text-muted">xkcd Password Generator</h3>
      </div>

      <div class="jumbotron">
        <h1>xkcd</h1>
        <p class="lead">xkcd is a fun comic about technology written by Randall Munroe.</p>
        <p>Enter a number, select some options and get your very own xkcd password!</p>
        
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <form method='POST' action='index.php'>
            <div class="form-group">
              <div id="error">
                <?php
                  echo $userMessage;
                ?>
              </div>
              <label for="numberOfWords">Number of Words (Max: 4)</label>
              <input name="numberOfWords" type="number" class="form-control" id="Number Of Words" placeholder="Number Of Words">
            </div>
            
           
            <div class="checkbox">
              <label>
                <input name="number" type="checkbox"> Include a number
              </label>
              <br>
              <label>
                <input name="specialCharacter" type="checkbox"> Include a special character (#, @)
              </label>
            </div>
            <button type="submit" class="btn btn-primary">Generate Password</button>
          </form>
        </div>

        <div class="col-lg-6">
          <h2>Password</h2>
          <div class="panel panel-success">

            <div class="panel-body" id="passwordText">
              <?php

                if ($passwordString)
                { 
                  echo $passwordString;
                }
                else 
                {
                  echo "Generate a password now";
                }

              ?>
            </div>
          </div>
        </div>
      </div>
      <br>
      <footer class="footer">
        <p id="footer">&copy; Richard Hsu 2015</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>