<div class="container-sm modifyArticle-page">
    <form class="modifyArticle-form" action="<?= './index.php?action=updateArticle&id=' . $post->getId(); ?>" method="POST">
        <div class="formInput mb-3">
            <label for="title" class="form-label">Titre :</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $post->getTitle() ?>" require>
        </div>
        <div class="formInput mb-3">
            <label for="chapo" class="form-label">Chapeau (500 caractères) :</label>
            <textarea type="textarea" class="form-control txtarea" id="chapo" name="chapo" maxlength="500" require><?= $post->getChapo() ?>    
        </textarea>
        </div>
        <div class="formInput mb-3">
            <label for="content" class="form-label">Article :</label>
            <textarea type="textarea" class="form-control txtarea" id="content" name="content" require><?= $post->getContent() ?>
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
        <div class="modifyArticle-btn">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>
</div>