<?php

use App\Models\AuditLog;

$activities = AuditLog::latest(10);

use App\Models\Unit;

$totalUnits = Unit::countAll();
$occupiedUnits = Unit::countOccupied();
$vacantUnits = Unit::countVacant();
$overdueUnits = Unit::countOverdue();
$occupancyPercentage = 0;

if ($totalUnits > 0) {

    $occupancyPercentage = round(
        ($occupiedUnits / $totalUnits) * 100
    );

}

$progressColour = 'bg-danger';

if ($occupancyPercentage >= 80) {

    $progressColour = 'bg-success';

}
elseif ($occupancyPercentage >= 50) {

    $progressColour = 'bg-warning';

}

$pageTitle = 'Dashboard';

ob_start();

?>

<div class="alert alert-primary">

    Welcome back,

    <strong>

        <?= htmlspecialchars(
            $_SESSION['username']
        ) ?>

    </strong>

</div>

<h2 class="mb-4">

    Dashboard

</h2>

<div class="row">

    <div class="col-md-3">

        <div class="card text-bg-primary mb-3">

            <div class="card-body stat-card">

                <i class="fas fa-building fa-2x mb-2"></i>

                <h5>Total Units</h5>

                <h2><?= $totalUnits ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card text-bg-success mb-3">

            <div class="card-body stat-card">

                <i class="fas fa-user-check fa-2x mb-2"></i>

                <h5>Occupied</h5>

                <h2><?= $occupiedUnits ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card text-bg-warning mb-3">

            <div class="card-body stat-card">

                <i class="fas fa-door-open fa-2x mb-2"></i>

                <h5>Vacant</h5>

                <h2><?= $vacantUnits ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card text-bg-danger mb-3">

            <div class="card-body stat-card">

                <i class="fas fa-triangle-exclamation fa-2x mb-2"></i>

                <h5>Overdue</h5>

                <h2><?= $overdueUnits ?></h2>

            </div>

        </div>

    </div>

</div>

<div class="card mt-4">

    <div class="card-header">

        Storage Occupancy

    </div>

    <div class="card-body">

        <div class="d-flex justify-content-between mb-2">

            <span>

                <?= $occupiedUnits ?>
                of
                <?= $totalUnits ?>
                Units Occupied

            </span>

            <strong>

                <?= $occupancyPercentage ?>%

            </strong>

        </div>

        <div class="progress" style="height: 30px;">

            <div
                class="progress-bar <?= $progressColour ?>"
                role="progressbar"
                style="width: <?= $occupancyPercentage ?>%;"
                aria-valuenow="<?= $occupancyPercentage ?>"
                aria-valuemin="0"
                aria-valuemax="100">

                <?= $occupancyPercentage ?>%

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">

                Quick Actions

            </div>

            <div class="card-body">

                <a
                    href="/units"
                    class="btn btn-primary me-2">

                    <i class="fas fa-boxes-stacked"></i>

                    View Units

                </a>

                <a
                    href="/import"
                    class="btn btn-success me-2">

                    <i class="fas fa-file-import"></i>

                    Import

                </a>

                <a
                    href="/export"
                    class="btn btn-warning">

                    <i class="fas fa-file-export"></i>

                    Export

                </a>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">

                Facility Summary

            </div>

            <div class="card-body">

                <ul class="list-group">

                    <li class="list-group-item d-flex justify-content-between">

                        Occupancy Rate

                        <span>

                            <?= $occupancyPercentage ?>%

                        </span>

                    </li>

                    <li class="list-group-item d-flex justify-content-between">

                        Vacant Units

                        <span>

                            <?= $vacantUnits ?>

                        </span>

                    </li>

                    <li class="list-group-item d-flex justify-content-between">

                        Units In Arrears

                        <span>

                            <?= $overdueUnits ?>

                        </span>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</div>

<div class="card mt-4">

    <div class="card-header">

        Recent Activity

    </div>

    <div class="card-body">

        <?php if (empty($activities)): ?>

            <p class="text-muted">

                No activity recorded.

            </p>

        <?php else: ?>

            <ul class="list-group">

                <?php foreach ($activities as $activity): ?>

                    <li class="list-group-item">

                        <small
                            class="text-muted">

                            <?= date(
                                'd/m/Y H:i',
                                strtotime(
                                    $activity['created_at']
                                )
                            ) ?>

                        </small>

                        <br>

                        <?= htmlspecialchars(
                            $activity['description']
                        ) ?>

                    </li>

                <?php endforeach; ?>

            </ul>

        <?php endif; ?>

    </div>

</div>

<div class="card mt-4">

    <div class="card-header bg-dark text-white">

        <i class="fas fa-road me-2"></i>

        Future Development

    </div>

    <div class="card-body">

        <div class="row g-3">

<div class="col-md-3">

    <div class="card h-100 border-primary">

        <div class="card-body text-center">

            <i class="fas fa-chart-bar fa-2x text-primary mb-3"></i>

            <h5>Reports</h5>

            <span class="badge bg-secondary">
                Planned
            </span>

            <div class="mt-3">

                <a href="/under-construction?feature=Reports"
                   class="btn btn-outline-primary">

                    Open

                </a>

            </div>

        </div>

    </div>

</div>

<div class="col-md-3">

    <div class="card h-100 border-success">

        <div class="card-body text-center">

            <i class="fas fa-chart-line fa-2x text-success mb-3"></i>

            <h5>Analytics</h5>

            <span class="badge bg-secondary">
                Planned
            </span>

            <div class="mt-3">

                <a href="/under-construction?feature=Analytics"
                   class="btn btn-outline-success">

                    Open

                </a>

            </div>

        </div>

    </div>

</div>

<div class="col-md-3">

    <div class="card h-100 border-warning">

        <div class="card-body text-center">

            <i class="fas fa-users fa-2x text-warning mb-3"></i>

            <h5>User Management</h5>

            <span class="badge bg-secondary">
                Planned
            </span>

            <div class="mt-3">

                <a href="/under-construction?feature=User%20Management"
                   class="btn btn-outline-warning">

                    Open

                </a>

            </div>

        </div>

    </div>

</div>

<div class="col-md-3">

    <div class="card h-100 border-danger">

        <div class="card-body text-center">

            <i class="fas fa-database fa-2x text-danger mb-3"></i>

            <h5>Backup Centre</h5>

            <span class="badge bg-secondary">
                Planned
            </span>

            <div class="mt-3">

                <a href="/under-construction?feature=Backup%20Centre"
                   class="btn btn-outline-danger">

                    Open

                </a>

            </div>

        </div>

    </div>

</div>

        </div>

    </div>

</div>

<?php

$content = ob_get_clean();

include __DIR__ .
    '/layouts/main.php';
