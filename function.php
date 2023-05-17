<?php 
Class Resmi{
	public function getData(){
		$apiUrl = "https://date.nager.at/api/v2/publicholidays/" . date( 'Y' ) . "/tr";
		$response = file_get_contents( $apiUrl );
		$veri = json_decode( $response, true );
		return $veri;
	}
	public function cevirTatil_Function( $tatilAdi ) {
		$ceviriTablosu = array(
			"New Year's Day" => "Yılbaşı",
			"Labour Day" => "Emek ve Dayanışma Günü",
			"Easter Monday" => "Paskalya Pazartesi",
			"Republic Day" => "Cumhuriyet Bayramı",
			"Victory Day" => "Zafer Bayramı",
			"Youth and Sports Day" => "Gençlik ve Spor Bayramı",
			"Democracy and National Unity Day" => "Demokrasi ve Milli Birlik Günü",
			"Sacrifice Feast" => "Kurban Bayramı",
			"Eid al-Fitr First Day" => "Ramazan Bayramı Birinci Gün",
			"Eid al-Fitr Second Day" => "Ramazan Bayramı İkinci Gün",
			"National Independence & Children's Day" => "Ulusal Egemenlik ve Çocuk Bayramı",
			"Eid al-Fitr Third Day" => "Ramazan Bayramı Üçüncü Gün",
			"Atatürk Commemoration & Youth Day" => "Atatürk'ü Anma Gençlik ve Spor Bayramı",
			"Eid al-Adha First Day" => "Kurban Bayramı Birinci Gün",
			"Eid al-Adha Second Day" => "Kurban Bayramı İkinci Gün",
			"Eid al-Adha Third Day" => "Kurban Bayramı Üçüncü Gün",
			"Eid al-Adha Fourth Day" => "Kurban Bayramı Dördüncü Gün"
		);

		if ( isset( $ceviriTablosu[ $tatilAdi ] ) ) {
			return $ceviriTablosu[ $tatilAdi ];
		}
		return $tatilAdi;
	}

	public function cevirAy_Function( $ayAdi ) {
		$ceviriTablosu = array(
			"January" => "Ocak",
			"February" => "Şubat",
			"March" => "Mart",
			"April" => "Nisan",
			"May" => "Mayıs",
			"June" => "Haziran",
			"July" => "Temmuz",
			"August" => "Ağustos",
			"September" => "Eylül",
			"October" => "Ekim",
			"November" => "Kasım",
			"December" => "Aralık",
			"Jan" => "Oca",
			"Feb" => "Şub",
			"Mar" => "Mar",
			"Apr" => "Nis",
			"Jun" => "Haz",
			"Jul" => "Tem",
			"Aug" => "Ağu",
			"Sep" => "Eyl",
			"Oct" => "Eki",
			"Nov" => "Kas",
			"Dec" => "Ara"
		);

		$ayParcalari = explode( ' ', $ayAdi );
		$cevrilmisParcalar = array();
		foreach ( $ayParcalari as $parca ) {
			if ( isset( $ceviriTablosu[ $parca ] ) ) {
				$cevrilmisParcalar[] = $ceviriTablosu[ $parca ];
			} else {
				$cevrilmisParcalar[] = $parca;
			}
		}

		return implode( ' ', $cevrilmisParcalar );
	}


}