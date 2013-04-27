<?php require_once('includes/initialize.php'); ?>
<?php print_r(Kosarica::getUserHitory(1)); ?>



<?php /*

SELECT a.id AS akcija, p.id AS ponuda, p.naslov, p.podnaslov, p.cijena, a.popust,
(SELECT sum(ra.kolicina)
FROM racuni_akcije as ra
WHERE ra.id_akcije=a.id GROUP BY ra.id_akcije ) as kupljeno,
a.granica, a.datum_zavrsetka,
p.opis_naslov, p.opis_kratki, p.opis, p.napomena,
p.karta_x, p.karta_y
FROM  akcije AS a
JOIN ponude AS p ON a.id_ponude=p.id
JOIN prodavatelji AS prod ON p.id_prodavatelja=prod.id
WHERE
a.aktivan=1 AND
p.aktivan=1 AND
prod.aktivan=1
ORDER BY a.istaknuto DESC, a.datum_zavrsetka ASC
LIMIT 1 OFFSET 0

	$ponude = Ponude::find_all();
	foreach ($ponude as $p) {
		$nova = Ponude::find_by_id($p->id);
		foreach ($p as $key => $value) {
			$nova->$key = strip_tags($value);
			//$value = strip_tags($value);
			//print_r($key);
		}
		$nova->save();
		//print_r($p);
	}
	echo "kraj";;*/
?>