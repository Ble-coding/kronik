<?php
// Charger les traductions spécifiques au formulaire de contact
$form_translations = include __DIR__ . "/../../languages/{$lang}/contact/form.php";

// Récupérer les erreurs et anciennes données de formulaire
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

// Supprimer les erreurs après affichage
session_destroy();
?>

<form class="form" action="mail/contact.php?lang=<?= htmlspecialchars($lang) ?>" method="POST">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" name="user" class="form-control user" 
                       placeholder="<?= htmlspecialchars($form_translations['form']['name_placeholder']) ?>" 
                       value="<?= htmlspecialchars($old['user'] ?? '') ?>" />
                <?php if (isset($errors['user'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['user']) ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <input type="email" name="email" class="form-control email" 
                       placeholder="<?= htmlspecialchars($form_translations['form']['email_placeholder']) ?>" 
                       value="<?= htmlspecialchars($old['email'] ?? '') ?>" />
                <?php if (isset($errors['email'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['email']) ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="tel" name="phone" class="form-control phone" 
                       placeholder="<?= htmlspecialchars($form_translations['form']['phone_placeholder']) ?>" 
                       value="<?= htmlspecialchars($old['phone'] ?? '') ?>" />
                <?php if (isset($errors['phone'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['phone']) ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="note" class="form-control note" 
                       placeholder="<?= htmlspecialchars($form_translations['form']['subject_placeholder']) ?>" 
                       value="<?= htmlspecialchars($old['note'] ?? '') ?>" />
            </div>
        </div>
        <div class="col-md-12 mt-5 pt-3">
            <div class="form-group">
                <textarea name="message" class="form-control message" 
                          placeholder="<?= htmlspecialchars($form_translations['form']['message_placeholder']) ?>"><?= htmlspecialchars($old['message'] ?? '') ?></textarea>
                <?php if (isset($errors['message'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['message']) ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-primary-home-square">
                    <?= htmlspecialchars($form_translations['form']['send_button']) ?>
                </button>
            </div>
        </div>
    </div>
</form>
