<?php
    session_start();
    include_once 'connect.php';


    $sql = "SELECT * from sondage s INNER JOIN categorie c on s.idCategorie = c.idCategorie";

    $result = $connect->query($sql);

    $data = json_encode($result->fetchAll());

?>


<!DOCTYPE html>
<html ng-app="myApp">
    <head>
        <meta charset="utf-8">
        <title>Sondage Angular</title>
        <script type="text/javascript" src="angular-1.4.9/angular.min.js"></script>
        <link rel="stylesheet" href="bootstrap.css" media="screen" title="no title" charset="utf-8">

    </head>
    <body>
        <div class="container" ng-controller="mainController">
            <h1>Sondage Angular</h1>

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Sondage Angular</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="">
                            Cinema/Series
                            </a>
                        </li>
                        <li>
                            <a href="">
                            Sport
                            </a>
                        </li>
                        <li>
                            <a href="">
                            Jeux Videos
                            </a>
                        </li>
                        <li>
                            <a href="">
                            Livres
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>


            <div class="row">
                <div class="col-md-10"><?php
                    if(isset($_SESSION['user'])) {
                        echo '<input type = "button" id = "btnCreerSondage" value = "Creer un sondage" >';
                    }
                    ?>
                    <fieldset >
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Libelle Sondage:</th>
                                    <th>Participer:</th>
                                    <th>Nombre de participants:</th>
                                    <th>Nombre de jours avant la fin du sondage:</th>
                                    <th>Voir tout les sondages de la categorie:</th>
                                </tr>
                            </thead>
                            <tr data-ng-repeat="sondage in sondages" afficher-sondage>
                            </tr>
                        </table>

                    </fieldset>

                </div>

                <div class="col-md-2">
                    <fieldset>
                        <legend class="scheduler-border">S'inscrire</legend>
                        <form class="form-horizontal"  ng-submit="addUser()">

                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Email</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" placeholder="Email" ng-model="user.email">
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Password</label>
                                <div class="controls">
                                    <input type="password" id="inputPassword" placeholder="Password" ng-model="user.password">
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <label>
                                        Genre:
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" id="optionsRadios1" value="option1" ng-model="user.sexe">M
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio"  id="optionsRadios2" value="option2" ng-model="user.sexe">F
                                    </label>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="pseudo">Pseudo</label>
                                <div class="controls">
                                    <input type="text" id="pseudo" placeholder="pseudo" ng-model="user.pseudo">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="codePostal">Code Postal</label>
                                <div class="controls">
                                    <input type="text" id="codePostal" placeholder="Code Postal" ng-model="user.codePostal" ng-change="getVille()">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="ville">Ville</label>
                                <div class="controls">
                                    <select id="ville" ng-model="user.ville" ng-options="ville as ville.libelleVille for ville in villes">

                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="dateNaissance">Date de Naissance</label>
                                <div class="controls">
                                    <input type="date" id="dateNaissance" ng-model="user.dateNaissance">
                                </div>
                            </div>
                            <br>

                            <button type="submit" class="btn">Sign in</button>
                        </form>

                    </fieldset>



                    <fieldset>
                        <legend class="scheduler-border">Se connecter</legend>
                        <form class="form-horizontal" ng-submit="connect()">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Email</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" placeholder="Email" ng-model="connect.email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Password</label>
                                <div class="controls">
                                    <input type="password" id="inputPassword" placeholder="Password" ng-model="connect.password">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn">Se connecter</button>
                        <form>
                    </fieldset>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            var data = <?php echo $data; ?>
        </script>
        <script type="text/javascript" src="index.js"></script>
    </body>
</html>
