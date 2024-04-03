<div class="wrapper">
    <h2> LOGIN </h2>
    <form class="loginform" method="POST" action="/login">
        <label for="login">Identifiant</label>
        <div class="input-container">
            <input class="input1" id="login" name="login" type="text" />
            <span class="icon"><img src="assets/Icons/person.svg" alt="User Icon"></span>
        </div>
        <label class="label2" for="login">Mot de passe</label>
        <div class="input-container">
            <input class="input2" id="password" name="password" type="password">
            <span class="icon"><img src="assets/Icons/lock-closed.svg" alt="Lock Icon"></span>
        </div>
        <button type="submit" class="CB">Se connecter</button>
    </form>
</div>