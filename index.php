<?php
include 'function.php';


$api = new Resmi();




$veri=$api->getData();



$simdikiTarih = date( 'Y-m-d' );
if ( !empty( $veri ) ) {
	echo "<strong>" . date( 'Y' ) . " Resmi Tatiller</strong><hr>";
	foreach ( $veri as $tatil ) {
		$cevrilmisAd = $api->cevirTatil_Function( $tatil[ 'name' ] );
		$tatilTarihi = date( 'd F', strtotime( $tatil[ 'date' ] ) );
		$cevrilmisTarih = str_replace(
			array( 'May', 'June' ),
			array( 'May', 'Haziran' ),
			$api->cevirAy_Function( $tatilTarihi )
		);
		if ( $tatil[ 'date' ] >= $simdikiTarih ) {
			echo "<strong>" . $cevrilmisTarih . "</strong> - " . $cevrilmisAd . "<br>";
		}
	}
} else {
	echo "Resmi tatil günleri alınamadı.";
}
?>