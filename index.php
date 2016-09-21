<?php
require_once(__DIR__.'/functions.php');
$process = process_formdata();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SQL-Injection</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body{
            padding-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if(!empty($process['text'])){ ?>
        <div class="alert alert-info"><?= $process['text']; ?></div>
    <?php } ?>

    <form class="form-horizontal" method="get" action="">
        <fieldset>
            <!-- Form Name -->
            <legend>Login</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="login_name">Name</label>
                <div class="col-md-9">
                    <input id="login_name" name="login[name]" type="text" placeholder="" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="login_password">Passwort</label>
                <div class="col-md-9">
                    <input id="login_password" name="login[password]" type="password" placeholder="" class="form-control input-md">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <input class="btn btn-success btn-block" type="submit" value="Senden">
                </div>
            </div>
        </fieldset>
    </form>

    <form class="form-horizontal" method="get" action="">
        <fieldset>
            <!-- Form Name -->
            <legend>Passwort ändern</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="pwchange_name">Name</label>
                <div class="col-md-9">
                    <input id="pwchange_name" name="pwchange[name]" type="text" placeholder="" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="pwchange_old">Altes Passwort</label>
                <div class="col-md-9">
                    <input id="pwchange_old" name="pwchange[old]" type="password" placeholder="" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="pwchange_new">Neues Passwort</label>
                <div class="col-md-9">
                    <input id="pwchange_new" name="pwchange[new]" type="password" placeholder="" class="form-control input-md">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <input class="btn btn-success btn-block" type="submit" value="Senden">
                </div>
            </div>
        </fieldset>
    </form>

    <form class="form-horizontal" method="get" action="">
        <fieldset>
            <!-- Form Name -->
            <legend>Neuer Benutzer</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="newuser_name">Name</label>
                <div class="col-md-9">
                    <input id="newuser_name" name="newuser[name]" type="text" placeholder="" class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="newuser_password">Passwort</label>
                <div class="col-md-9">
                    <input id="newuser_password" name="newuser[password]" type="password" placeholder="" class="form-control input-md">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <input class="btn btn-success btn-block" type="submit" value="Senden">
                </div>
            </div>
        </fieldset>
    </form>

    <form class="form-horizontal" method="get" action="">
        <fieldset>
            <!-- Form Name -->
            <legend>Suche</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="search_name">Name</label>
                <div class="col-md-9">
                    <input id="search_name" name="search[name]" type="text" placeholder="" class="form-control input-md">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <input class="btn btn-success btn-block" type="submit" value="Senden">
                </div>
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>