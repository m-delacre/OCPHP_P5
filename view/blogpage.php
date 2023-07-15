<div>
    <h1>Tous nos articles :</h1>
    <?php foreach ($posts as $post) : ?>
        <article>
            <h3><a class="text-decoration-none" href=<?= "./index.php?action=showPost&id=" . $post->getId(); ?>><?= $post->getTitle(); ?></a></h3>
            <p>Auteur : <?= $post->getAuthor(); ?> - Date de publication : <?= $post->getDateFr(); ?></p>
            <h4><?= $post->getChapo(); ?></h4>
            <p><?= $post->getContent(); ?></p>
        </article>
    <? endforeach; ?>
</div>