<?php require_once 'layout/header.php'; ?>

<div class="logo">
	<img src="images/logo.png">
</div>

<form action="admin/" method="POST" class="login">

  <div class="head">
    <h1><i class="fa fa-cloud"></i>Connexion</h1>
  </div>

  <div class="body">
    <div class="field">
      <label for="email">Email</label>
      <input name="mail" type="email" id="mail" placeholder="Email" />
    </div>
    <div class="field">
      <label for="password">Mot de passe</label>
      <input name="mdp" type="password" id="password" placeholder="Mot de passe" />
    </div>
    <div class="buttonPart">
      <button type="submit"><span>GO</span></button>
    </div>
     <div class="buttonLogin">
      <button type="submit"><span>S'inscrire</span></button>
    </div>
  </div>
</form>

<?php require_once 'layout/footer.php'; ?>
