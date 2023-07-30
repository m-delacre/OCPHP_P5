<form action="./index.php?action=postNewArticle" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="title"  class="form-control" id="title" name="title" require>
    </div>
    <div class="mb-3">
        <label for="chapo" class="form-label">Chapo</label>
        <input type="chapo" class="form-control" id="chapo" maxlength="500" name="chapo" require>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <input type="content" class="form-control" id="content" name="content" require>
    </div>
    <div class="mb-3">
        <input type="radio" id="visible" name="is_visible" value=1>
        <label for="visible">visible</label><br>
        <input type="radio" id="hidden" name="is_visible" value=0 checked>
        <label for="hidden">cacher</label><br>
    </div>
    <button type="submit" class="btn btn-success">Publier</button>
</form>