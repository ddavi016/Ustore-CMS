<?php

$feature = $_GET['feature'] ?? 'Feature';

$pageTitle = $feature . ' - Under Development';

ob_start();
?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-lg border-0">

                <div class="card-body text-center p-5">

                    <div class="display-1 mb-4">
                        🚧
                    </div>

                    <h1 class="fw-bold">
                        <?= htmlspecialchars($feature) ?>
                    </h1>

                    <p class="lead text-muted">
                        This module is currently under development.
                    </p>

                    <hr>

                    <p>
                        The Storage CMS team is actively working on this
                        functionality and it will be available in a future
                        release.
                    </p>

                    <div class="alert alert-info mt-4">

                        <strong>Status:</strong>
                        Development In Progress

                    </div>

                    <div class="mt-4">

                        <a href="/dashboard"
                           class="btn btn-primary btn-lg">

                            ← Back to Dashboard

                        </a>

                    </div>

                    <div class="small text-muted mt-4">

                        Storage CMS Development Build

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/layouts/main.php';
