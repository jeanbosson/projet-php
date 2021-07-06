<?php
$nextWeek = time() + (31 * 24 * 60 * 60);
// 7 jours; 24 heures; 60 minutes; 60 secondes
echo 'Aujourd\'hui :       '. date('Y-m-d') ."\n";
echo 'mois prochain : '. date('Y-m-d', $nextWeek) ."\n";
// ou en utilisant strtotime():
echo 'la semaine prochain est : '. date('Y-m-d', strtotime('+1 month')) ."\n";
?>