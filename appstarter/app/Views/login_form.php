<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    // Définir la base URL
    $base_url = "http://www.localhost/login";

    // Inclure le fichier CSS avec la base URL
    echo '<link rel="stylesheet" href="' . $base_url . 'appstarter/public/CSS/login_form.css">';
    ?>

    <style {csp-style-nonce}>
        @font-face {
            font-family: 'Jellee';
            src: url('D:/DEV WEB - TP3/WEB-TP3/appstarter/public/Jellee-Bold.otf') format('otf');
        }
        html,
        body {
            font-family: 'Jellee', sans-serif;
            background: linear-gradient(#1D1A39, #1D1A52);
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: auto;
        }

        h1 {
            text-align: center;
            font-size: 3rem;
            font-weight: 5px;
            color: #fffff0;
        }

        .CB {
            border-radius: 6px;
            width: 250px;
            height: 60px;
            margin-top: 5vh;
            margin-left: 43vw;
            display: block;
            transition: .4s ease-in;
            font-family: 'Jellee', sans-serif;
            font-size: 1.5rem;
        }

        .CB:hover {
            box-shadow: 0 0 5px #E8BCB9, 0 0 25px #F39F5A, 0 0 50px #AE445A, 0 0 200px #662549,
                inset 0 0 5px #E8BCB9, inset 0 0 25px #F39F5A, inset 0 0 50px #AE445A, inset 0 0 200px #662549;

        }

        .loginform {
            padding-top: 10vh;
            text-align: center;
            color: #fffff0;
            font-size: 1.5rem;
        }

        .input1,
        .input2 {
            margin-bottom: 60px;
            margin-right: 3vw;
            width: 300px;
            height: 20px;
            border-radius: 8px;
            font-size: 1.5rem;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <h1>Bibliotheca 3301</h1>
    <form class="loginform" method="POST" action="/login">
        <label for="login">Matricule / Identifiant</label>
        <input class="input1" id="login" name="login" type="text" />
        <label for="password">Mot de passe</label>
        <input class="input2" id="password" name="password" type="password" />
        <button type="submit" class="CB">Se connecter</button>
    </form>
</body>

</html>