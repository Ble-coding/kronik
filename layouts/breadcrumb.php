<?php
function renderBreadcrumb($title, $breadcrumbs) {
    ?>
    <section class="box-faq-single-banner box-blog-single-banner">
        <div class="box-faq-single-banner-inner">
            <div class="container">
                <h1 class="display-ag-2xl color-white"><?= htmlspecialchars($title) ?></h1>
                <div class="box-breadcrumb">
                    <ul class="breadcrumb">
                        <?php foreach ($breadcrumbs as $crumb): ?>
                            <li class="breadcrumb-item">
                                <?php if (!empty($crumb['url'])): ?>
                                    <a href="<?= htmlspecialchars($crumb['url']) ?>"><?= htmlspecialchars($crumb['label']) ?></a>
                                <?php else: ?>
                                    <span><?= htmlspecialchars($crumb['label']) ?></span>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>
