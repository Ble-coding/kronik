
<div class="box-contactus mb-30">
    <h5 class="title-contactus neutral-1000 mb-3">
        <?= htmlspecialchars($translations['title']) ?>
    </h5>
    <div class="contact-info">
        <p class="address-2 text-md-medium neutral-1000">
        <strong><?= htmlspecialchars($translations['address_label']) ?> : </strong>
            <?= htmlspecialchars($translations['address']) ?>
        </p>
        <p class="hour-work-2 text-md-medium neutral-1000">
        <strong><?= htmlspecialchars($translations['hours_label']) ?> : </strong>
            <?= htmlspecialchars($translations['hours']) ?>
        </p>
        <p class="hour-work-2 text-md-medium neutral-1000">
        <strong><?= htmlspecialchars($translations['phone_label']) ?> : </strong>
            <a href="callto:<?= htmlspecialchars($translations['phone_link']) ?>">
                <?= htmlspecialchars($translations['phone']) ?>
            </a>
        </p>
        <p class="hour-work-2 text-md-medium neutral-1000">
        <strong><?= htmlspecialchars($translations['email_label']) ?> : </strong>
            <a href="mailto:<?= htmlspecialchars($translations['email_link']) ?>">
                <?= htmlspecialchars($translations['email']) ?>
            </a>
        </p>
    </div>
</div>
