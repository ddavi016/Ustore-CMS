<?php

$pdo = new PDO(
    "mysql:host=localhost;dbname=storagecms",
    "storageuser",
    "CMS1234cms"
);

for ($i=1;$i<=66;$i++) {

    $code = sprintf('U%02d',$i);

    $stmt = $pdo->prepare(
        "INSERT INTO units(unit_code)
         VALUES(?)"
    );

    $stmt->execute([$code]);
}

echo "Units created";
