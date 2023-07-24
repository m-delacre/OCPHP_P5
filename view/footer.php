<footer class=" d-flex justify-content-around bg-dark text-center text-white flex-wrap" style="background-color: rgba(0, 0, 0, 0.2);">
    <div class="position-relative w-100 p-5">
        © 2023 Copyright:
        <a class="text-white text-decoration-none" href="./index.php?action=home">MattBlog</a>
        <?php if (isset($_SESSION['user_isAdmin']) && $_SESSION['user_isAdmin'] === true) : ?>
            <div class="mt-3">
                <a class="text-white text-decoration-none" href="./index.php?action=administration">Administration</a>
            </div>
        <?php endif; ?>
    </div>
</footer>