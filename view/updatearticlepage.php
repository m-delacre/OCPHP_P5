<form action="<?= './index.php?action=updateArticle&id=' . $post->getId(); ?>" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $post->getTitle() ?>" require>
    </div>
    <div class="mb-3">
        <label for="chapo" class="form-label">Chapo</label>
        <input type="text" class="form-control" id="chapo" name="chapo" value="<?= $post->getChapo() ?>" require>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea type="textarea" class="form-control" id="content" name="content" require><?= $post->getContent() ?>
        </textarea>
    </div>
    <div class="mb-3">
        <?php if ($post->getIsVisible() === true) : ?>
            <input type="radio" id="visible" name="is_visible" value=1 checked>
            <label for="visible">visible</label><br>
            <input type="radio" id="hidden" name="is_visible" value=0>
            <label for="hidden">cacher</label><br>
        <?php else : ?>
            <input type="radio" id="visible" name="is_visible" value=1>
            <label for="visible">visible</label><br>
            <input type="radio" id="hidden" name="is_visible" value=0 checked>
            <label for="hidden">cacher</label><br>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-success">Modifier</button>
</form>