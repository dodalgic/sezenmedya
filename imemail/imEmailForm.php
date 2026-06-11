<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
	include '../res/x5engine.php';
	$form = new ImForm();

	$errorMessage = '';
	if(@$_POST['action'] != 'check_answer') {
	$form->setField('Ad Soyad', @$_POST['imObjectForm_13_1'], '', false);
	$form->setField('E-posta Adresi', @$_POST['imObjectForm_13_2'], '', false);
	$form->setField('Konu', @$_POST['imObjectForm_13_3'], '', false);
	$form->setField('Mesajınız', @$_POST['imObjectForm_13_4'], '', false);
	$form->setField('KVKK Onayı', @$_POST['imObjectForm_13_5'], '', false);
		if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != '6185261E0DD1C5ECDBD32E63390222F5' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
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