<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
	include '../res/x5engine.php';
	$form = new ImForm();

	$errorMessage = '';
	if(@$_POST['action'] != 'check_answer') {
	$form->setField('Ad Soyad', @$_POST['imObjectForm_23_1'], '', false);
	$form->setField('Firma Adı', @$_POST['imObjectForm_23_2'], '', false);
	$form->setField('E-posta Adresi', @$_POST['imObjectForm_23_3'], '', false);
	$form->setField('Web Sitesi / Proje Adresi', @$_POST['imObjectForm_23_4'], '', false);
	$form->setField('Tahmini Bütçe Aralığı', @$_POST['imObjectForm_23_5'], '', false);
	$form->setField('Planlanan Kampanya Süresi', @$_POST['imObjectForm_23_6'], '', false);
	$form->setField('Tercih Ettiğiniz Reklam Türü', @$_POST['imObjectForm_23_7'], '', false);
	$form->setField('Hedeflenen Sayfalar/Bölümler ve Mesajınız', @$_POST['imObjectForm_23_8'], '', false);
	$form->setField('Kişisel verilerimin Gizlilik Politikası ve KVKK metni kapsamında işlenmesini kabul ediyorum.', @$_POST['imObjectForm_23_9'], '', false);
		if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != 'E02872C84980C776CF9E1B6E659308F2' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
			$errorMessage = "JavaScript'i aktifleştirmelisiniz!";
		$form->mailToOwner('mail@sezenmedya.com.tr', '', '', 'Yeni iletişim', "Web sitemden yeni veriler alındı:", false);
		if ($errorMessage == '') {
			echo "{\"status\" : true}";
		}

		else {
			echo "{\"status\" : false, \"err\" : \"$errorMessage\"}";
		}
		exit();
	} else {
		echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
	}
}

// End of file