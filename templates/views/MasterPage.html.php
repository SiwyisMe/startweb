<!DOCTYPE html>
<html data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
    </head>
    <body>
        <main>
            <section class="content">
                <?php include ('templates/views/index/form.html.php'); ?>
            </section>
            <section class="content">
                <center><h1 class="align-center">Lista użytkowników</h1></center>
                <?php include ('templates/views/index/users.html.php'); ?>
            </section>
        </main>
    </body>
</html>
