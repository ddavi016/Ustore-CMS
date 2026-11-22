<?php

$currentPath = parse_url(
    $_SERVER['REQUEST_URI'],
    PHP_URL_PATH
);
?>
<div class="col-md-2 sidebar">

    <div class="p-3">

        <ul class="nav flex-column">

            <li class="nav-item mb-2">

	<a href="/dashboard"
   	class="nav-link text-white <?= $currentPath === '/dashboard' ? 'active' : '' ?>">

                    <i class="fas fa-chart-line"></i>

                    Dashboard

                </a>

            </li>

            <li class="nav-item mb-2">

	<a href="/units"
   	class="nav-link text-white <?= $currentPath === '/units' ? 'active' : '' ?>">

                    <i class="fas fa-building"></i>

                    Units

                </a>

            </li>

            <li class="nav-item mb-2">

                <a href="/under-construction?feature=import"
                   class="nav-link text-white">

                    <i class="fas fa-file-import"></i>

                    Import

                </a>

            </li>

            <li class="nav-item mb-2">

                <a href="/under-construction?feature=export"
                   class="nav-link text-white">

                    <i class="fas fa-file-export"></i>

                    Export

                </a>

            </li>

            <li class="nav-item mb-2">

                <a href="/under-construction?feature=reports"
                   class="nav-link text-white">

                    <i class="fas fa-chart-pie"></i>

                    Reports

                </a>

            </li>

            <li class="nav-item mb-2">

                <a href="/under-construction?feature=settings"
                   class="nav-link text-white">

                    <i class="fas fa-cog"></i>

                    Settings

                </a>

            </li>

        </ul>

    </div>

</div>
