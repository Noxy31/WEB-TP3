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
            margin-top: 15vh;
        }

        .CB {
            border-radius: 10px;
            width: 250px;
            height: 60px;
            margin-top: 5vh;
            transition: .3s ease-in;
            font-family: 'Jellee', sans-serif;
            font-size: 1.5rem;
            
        }

        .CB:hover {
            box-shadow: inset 0 0 5px #1D1A32, inset 0 0 25px #1D1A48, inset 0 0 50px #1D1A52, inset 0 0 200px #1D1A39;
            color: white;

        }

        .loginform {
            padding-top: 10vh;
            text-align: center;
            color: #fffff0;
            font-size: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input1,
        .input2 {
            margin-bottom: 40px;
            width: 300px;
            height: 20px;
            border-radius: 8px;
            font-size: 1.5rem;
            text-align: center;
            padding: 5px;
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