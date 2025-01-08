<section class="box-section box-project-detail">
    <div class="container" data-aos="fade-up">
    <?php
$terms_translations = include __DIR__ . "/../../languages/{$lang}/terms/terms.php";
?>
<div class="blog-detail">
    <h2><?= htmlspecialchars($terms_translations['title']) ?></h2>
    <p><strong><?= htmlspecialchars($terms_translations['last_update']) ?></strong> 01-01-2025</p>
    <p><?= htmlspecialchars($terms_translations['intro']) ?></p>
    
    <?php foreach ($terms_translations['sections'] as $section): ?>
        <h4><?= htmlspecialchars($section['title']) ?></h4>
        <p><?= htmlspecialchars($section['content']) ?></p>
        <?php if (!empty($section['list'])): ?>
            <ul>
                <?php foreach ($section['list'] as $item): ?>
                    <li><?= $item ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <?php if (!empty($section['sublist_title'])): ?>
            <p><?= $section['sublist_title'] ?></p>
            <ul>
                <?php foreach ($section['sublist'] as $subitem): ?>
                    <li><?= $subitem ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
    </div>
</section>
