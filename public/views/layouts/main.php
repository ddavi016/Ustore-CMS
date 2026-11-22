<!DOCTYPE html>
<html lang="en">
<main class="col-md-10 main-content">
<head>

<link rel="icon"
      type="image/x-icon"
      href="/favicon.ico">

<link rel="shortcut icon"
      href="/favicon.ico">

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>
        <?= $pageTitle ?? 'Storage CMS'; ?>
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        rel="stylesheet">

    <link
        href="/assets/css/app.css"
        rel="stylesheet">

</head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<body>

<nav class="navbar navbar-dark bg-primary">

    <div class="container-fluid">

        <span class="navbar-brand">

            <i class="fas fa-warehouse"></i>

            Storage CMS

        </span>

        <div>

            <span class="text-white me-3">

                Welcome,
                <?= htmlspecialchars(
                    $_SESSION['username']
                ); ?>

            </span>

            <a href="/logout"
               class="btn btn-light btn-sm">

                Logout

            </a>

        </div>

    </div>

</nav>

<div class="container-fluid">

    <div class="row">

        <?php include __DIR__ . '/../partials/sidebar.php'; ?>

        <main class="col-md-10 p-4">

            <?= $content ?>

        </main>

    </div>

</div>

<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
<link rel="stylesheet"
      href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
</html>
