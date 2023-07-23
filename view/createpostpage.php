<form action="./index.php?action=postNewArticle" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="title"  class="form-control" id="title" name="title" require>
    </div>
    <div class="mb-3">
        <label for="chapo" class="form-label">Chapo</label>
        <input type="chapo" class="form-control" id="chapo" name="chapo" require>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <input type="content" class="form-control" id="content" name="content" require>
    </div>
    <button type="submit" class="btn btn-success">Publier</button>
</form>