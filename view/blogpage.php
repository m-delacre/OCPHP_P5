<div>
    <h1>Tous nos articles :</h1>
    <?php foreach ($posts as $post) : ?>
        <article>
            <h3><?= $post->getTitle(); ?></h3>
            <p>Auteur : <?= $post->getAuthor(); ?> - Date de publication : <?= $post->getDateFr(); ?></p>
            <h4><?= $post->getChapo(); ?></h4>
            <p><?= $post->getContent(); ?></p>
        </article>
    <? endforeach; ?>
</div>