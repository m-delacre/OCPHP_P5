<section class="container-fluid bg-dark text-light p-5 homeSectionHi">
    <img src="./public/images/logo.png" alt="logo" class="object-fit-cover rounded-circle homeLogo">
    <div class="d-flex flex-column justify-content-center m-5">
        <h1 class="d-flex justify-content-center fs-1">Matthieu Delacre</h1>
        <h3 class="fs-5">Développeur Web</h3>
    </div>
</section>

<?php if (isset($_GET['emailsucceed'])) : ?>
    <div class="container-lg alert alert-success mt-5" role="alert">
        <p>Email envoyé</p>
    </div>
<?php endif; ?>
<?php if (isset($_GET['emailerror'])) : ?>
    <div class="container-lg alert alert-danger mt-5" role="alert">
        <p>Erreur dans le formulaire de contacte verifiez les champs renseignés !</p>
    </div>
<?php endif; ?>

<section class="container-lg mt-5 mb-5">
    <h3>Contactez moi !</h3>
    <form action="./index.php?action=contactForm" method="POST">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nom-help" require>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="prenom-help" require>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="email-help" require>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Votre message</label>
            <textarea class="form-control" placeholder="Exprimez vous" id="message" name="message" require></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</section>

<section class="bg-dark sectionCV">
    <p class="text-white">Vous trouverez mon CV ici : <a href="./public/files/mon_super_cv.pdf" download="CV_Delacre_Matthieu">télécharger</a></p>
</section>

<secton class="container-lg d-flex flex-column mt-5 mb-5">
    <h3 class="d-flex justify-content-center">Mes réseaux sociaux :</h3>
    <div class="d-flex justify-content-center">
        <a href="https://twitter.com/AthosReeves" target="_blank"><i class="fa-brands fa-twitter mx-2" style="font-size: 40px;"></i></a>
        <a href="https://github.com/m-delacre" target="_blank"><i class="fa-brands fa-github mx-2 text-body-emphasis" style="font-size: 40px;"></i></a>
        <a href="https://www.linkedin.com/in/matthieu-delacre-4a6355178/" target="_blank"><i class="fa-brands fa-linkedin mx-2" style="font-size: 40px;"></i></a>
    </div>
</secton>