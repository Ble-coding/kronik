<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
session_destroy(); // Supprimer les erreurs après affichage
?>

<form class="form" action="mail/contact.php" method="POST">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" name="user" class="form-control user" placeholder="Votre nom" value="<?= htmlspecialchars($old['user'] ?? '') ?>"  />
                <?php if (isset($errors['user'])): ?>
                    <small class="text-danger"><?= $errors['user'] ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <input type="email" name="email" class="form-control email" placeholder="Votre adresse e-mail" value="<?= htmlspecialchars($old['email'] ?? '') ?>"  />
                <?php if (isset($errors['email'])): ?>
                    <small class="text-danger"><?= $errors['email'] ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="tel" name="phone" class="form-control phone" placeholder="Votre téléphone" value="<?= htmlspecialchars($old['phone'] ?? '') ?>"  />
                <?php if (isset($errors['phone'])): ?>
                    <small class="text-danger"><?= $errors['phone'] ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="note" class="form-control note" placeholder="Objet du message" value="<?= htmlspecialchars($old['note'] ?? '') ?>" />
            </div>
        </div>
        <div class="col-md-12 mt-5 pt-3">
            <div class="form-group">
                <input type="text" name="message" class="form-control message" placeholder="Votre message" value="<?= htmlspecialchars($old['message'] ?? '') ?>"  />
                <?php if (isset($errors['message'])): ?>
                    <small class="text-danger"><?= $errors['message'] ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-primary-home-square">ENVOYER</button>
            </div>
        </div>
    </div>
</form>
