<div class="wrapper-login">
    <h2 class="h2-login"> LOGIN </h2>
    <form class="loginform" method="POST" action="/login">
        <label for="login">Identifiant</label>
        <div class="input-container">
            <input class="input1-login" id="login" name="login" type="text" />
            <span class="icon-login"><img src="assets/Icons/person.svg" alt="User Icon"></span>
        </div>
        <label class="label2" for="login">Mot de passe</label>
        <div class="input-container">
            <input class="input2-login" id="password" name="password" type="password">
            <span class="icon-login"><img src="assets/Icons/lock-closed.svg" alt="Lock Icon"></span>
        </div>
        <button type="submit" class="CB">Se connecter</button>
    </form>
</div>