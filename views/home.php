<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/api/index.php')
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Inscription au colloque</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="/views/styles/home.css">
</head>
<body>
<main>
    <div class="container">
        <div class="col-sm-12 col-lg-12 title">
            <div class="row">
                <div class="col-xs-12  col-sm-offset-1 col-sm-10 col-lg-offset-1 col-lg-10">
                    <h1>Le Colloque d'Actualités Porcines</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 subTitle">
                    <div class="col-sm-4 col-lg-4 cercle">
                        <img src="/views/images/arrow1.png">
                    </div>
                    <div class="col-sm-8 col-lg-8 infos">
                        <b class="date">date</b>
                        <p class="space">Adresse</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-md-6 col-lg-6"></div>
                <div class="col-xs-6 col-md-3 col-lg-3">
                    <p class="colloc">Colloque organisé par</p>
                    <p class="logo"></p>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3">
                    <p class="picto"></p>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="container">
            <div class="col-sm-12 col-lg-12">
                <h2>Les nouveaux enjeux autour de tout cela</h2>
                <div class="row">
                    <div class="col-sm-12 col-lg-1 "></div>
                    <div class="col-sm-12 col-lg-10 specAround">
                        <div class="col-sm-6 col-sm-6 col-md-4 col-lg-4 spec">
                            <h3>spécialité</h3>
                        </div>
                        <div class=" col-sm-6 col-sm-6 col-md-4 col-lg-4 spec">
                            <h3>spécialité</h3>
                        </div>
                        <div class="col-sm-12 col-md-12 col-md-4 col-lg-4 spec">
                            <h3 class="retrait">spécialité</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-11 col-lg-11 text">
                    <p class="textsize" textSize>Orga vous convie au Colloque d'Actualités Porcines en compagnie de
                        ... (chercheur ), et d'autres
                        intervenants de qualité à découvrir bientôt...</p>
                </div>
            </div>

            <div class="row">
               
                            <div class="form-group">
                                <label for="hote">Invitation reçue de : </label>
                                <select required class="form-control" name="hote" id="hote">
                                    <option value=""><em>CHOISIR</em></option>
                                    <option value="zoopole"><p>orga1</p></option>
                                    <option value="vitalac"><p>orga2</p></option>
                                </select>
                            </div>
                            <div class="col-lg-12 validation">
                                <button type="submit" name="addUser">Valider</button>
                            </div>
                        </form>
                        <form action="" method="post" name="choose">
                            <input type=text name="code">
                            <button type="submit" name="choose">CODE
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <footer>
                <div class="col-lg-3"></div>

                <div class="col-lg-3">
                    <form action="/index.php" name="json" method="POST">
                        <input type="hidden"/>
                        <button type="submit" name="json">JSON</button>
                    </form>
                </div>
            </footer>
        </div>
    </div>
</body>

							





























