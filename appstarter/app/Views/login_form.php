<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Se connecter</h1>
    <form method="POST" action="/login">
        <label for="login">matricule abonné / identifiant
            admin</label>
        <input id="login" name="login" type="text" />
        <label for="password">nom abonné / mot de passe admin
        </label>
        <input id="password" name="password" type="password" />
        <button type="submit">Se connecter</button>
    </form>
</body>

</html>