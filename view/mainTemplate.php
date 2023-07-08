<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" rel="stylesheet">
    <title>Matt Blog</title>
</head>

<body>
    <?php include_once('./view/header.php'); ?>
    <main class="container-fluid min-vw-100 min-vh-100 m-0 p-0">
        <?= $content ?>
    </main>
    <?php include_once('./view/footer.php'); ?>
</body>

</html>