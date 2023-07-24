<form action=<?php './index.php?action=updateArticle&id' . $post->getId(); ?> method="POST">
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
        <input type="radio" id="visible" name="is_visible" value="visible">
        <label for="visible">visible</label><br>
        <input type="radio" id="hidden" name="is_visible" value="hidden">
        <label for="hidden">hidden</label><br>
    </div>
    <button type="submit" class="btn btn-success">Modifier</button>
</form>