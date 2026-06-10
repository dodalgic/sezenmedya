<?php

/*
|-------------------------------
|	GENERAL SETTINGS
|-------------------------------
*/

$imSettings['general'] = array(
	'site_id' => 'DB2D99C1E99897D2D554882E0D604F57',
	'url' => 'http://localhost/',
	'homepage_url' => 'http://localhost/index.php',
	'icon' => 'http://localhost/favImage.png',
	'version' => '2026.2.2.0',
	'sitename' => 'Sezen Medya – Canlı TV, Radyo ve Hesaplama Araçları',
	'lang_code' => 'tr-TR',
	'rtl' => false,
	'public_folder' => '',
	'salt' => '3ef9otuflfmlfqi1itr15qa7by6hsonqi3jjousi7df99yttznlsk4nc4',
	'common_email_sender_addres' => 'mail@sezenmedya.com.tr',
	'enable_sender_header' => true,
	'date_format' => 'dd/MM/yy',
	'date_format_ext' => 'dddd dd MMM yyyy',
	'date_format_no_day' => 'MM/yy',
	'date_format_no_day_ext' => 'MMM yyyy'
);
/*
|-------------------------------
|	BREAKPOINTS
|-------------------------------
*/

$imSettings['breakpoints'] = array(
	array("name" => "Desktop", "hash" => "ea2f0ee4d5cbb25e1ee6c7c4378fee7b", "start" => "max", "end" => 1150.0, "fluid" => false),
	array("name" => "Breakpoint 1", "hash" => "d2f9bff7f63c0d6b7c7d55510409c19b", "start" => 1149.9, "end" => 720.0, "fluid" => false),
	array("name" => "Mobile", "hash" => "72e5146e7d399bc2f8a12127e43469f1", "start" => 719.9, "end" => 480.0, "fluid" => false),
	array("name" => "Mobile Fluid", "hash" => "5ecdcca63de80fd3d4fbb36295d22b7d", "start" => 479.9, "end" => 0.0, "fluid" => true),
);
/*
|-------------------------------
|	PASSWORD POLICY
|-------------------------------
*/

$imSettings['password_policy'] = array(
	'required_policy' => false,
	'minimum_characters' => '6',
	'include_uppercase' => false,
	'include_numeric' => false,
	'include_special' => false
);
/*
|-------------------------------
|	Captcha
|-------------------------------
*/ImTopic::$captcha_code = "		<div class=\"x5captcha-wrap\">
			<label for=\"1wr3f1zb-imCpt\">Kontrol kelimesi:</label><br />
			<input type=\"text\" id=\"1wr3f1zb-imCpt\" class=\"imCpt\" name=\"imCpt\" maxlength=\"5\" />
		</div>
";


$imSettings['admin'] = array(
	'icon' => 'admin/images/logo_6egw3wvq.webp',
	'notification_public_key' => 'BBqnFTzRRtkQG2rLfYgLjPX6bpO0DaDYycxVoXfDcs22TvZmfagon5uaoplZ6p3-Pjv6aG7KZkCQkqccZnEnhVY',
	'notification_private_key' => 'efMD3JjXjipQy3l_CIzXVNipeH1L9rgIVYPo4Gf1QYA',
	'notification_dbprefix' => 'w5_9jip3mc6_notifications_',
	'enable_notifications' => false,
	'theme' => 'orange',
	'extra-dashboard' => array(),
	'extra-links' => array()
);


/*
|--------------------------------------------------------------------------------------
|	DATABASES SETTINGS
|--------------------------------------------------------------------------------------
*/

$imSettings['databases'] = array();
$ecommerce = Configuration::getCart();
// Setup the coupon data
$couponData = array();
$couponData['products'] = array();
// Setup the cart
$ecommerce->setPublicFolder('');
$ecommerce->setCouponData($couponData);
$ecommerce->setSettings(array(
	'page_url' => 'http://localhost/',
	'force_sender' => false,
	'mail_btn_css' => 'display: inline-block; text-decoration: none; color: rgba(40, 31, 26, 1); background-color: rgba(234, 226, 220, 1); padding: 10px 30px 10px 30px; border: solid; border-block-color: transparent transparent; border-inline-color: transparent transparent; border-width: 3px; border-radius: 5px; ',
	'email_opening' => 'Değerli Müşterimiz,<br /><br />Siparişiniz için teşekkür ederiz. Ödemenizi beklediğimizi hatırlatırız.<br /><br />Aşağıda sipariş ettiğiniz ürünlerin listesini, fatura ve nakliye detaylarını ve ödemeyi tamamlama talimatlarını bulacaksınız.',
	'email_closing' => 'Daha fazla bilgiye ihtiyacınız varsa lütfen bize ulaşın.<br /><br />Saygılarımızla, Satış Ekibi.',
	'email_payment_opening' => 'Değerli Müşterimiz,<br /><br />Satın aldığınız için teşekkür ederiz. Ödemenizi doğru bir şekilde aldığımızı ve siparişin mümkün olan en kısa sürede işleneceğini onaylıyoruz.<br /><br />Aşağıda sipariş ettiğiniz ürünlerin listesini, fatura ve nakliye detaylarını bulabilirsiniz.',
	'email_payment_closing' => 'Daha fazla bilgi için bizimle iletişime geçebilirsiniz.<br /><br />Saygılarımızla, Satış Ekibi.',
	'email_digital_shipment_opening' => 'Değerli Müşterimiz,<br />Satın alma işleminiz için teşekkür ederiz.<br />Ekte sipariş verdiğiniz ürünler için indirme linki listesi yer almaktadır:',
	'email_digital_shipment_closing' => 'Daha fazla bilgi için bizimle iletişime geçebilirsiniz.<br /><br />Saygılarımızla, Satış Ekibi.',
	'email_physical_shipment_opening' => 'Değerli Müşterimiz,<br />Satın aldığınız için teşekkür ederiz. Siparişin doğru şekilde işlendiğini ve gönderildiğini onaylıyoruz.<br />Lütfen sipariş edilen ürünlerin listesini ekte bulabilirsiniz: ',
	'email_physical_shipment_closing' => 'Daha fazla bilgi için bizimle iletişime geçebilirsiniz.<br /><br />Saygılarımızla, Satış Ekibi.',
	'sendEmailBeforePayment' => true,
	'sendEmailAfterPayment' => false,
	'useCSV' => false,
	'header_bg_color' => 'rgba(37, 58, 88, 1)',
	'header_text_color' => 'rgba(255, 255, 255, 1)',
	'cell_bg_color' => 'rgba(255, 255, 255, 1)',
	'cell_text_color' => 'rgba(0, 0, 0, 1)',
	'availability_reduction_type' => 1,
	'border_color' => 'rgba(211, 211, 211, 1)',
	'owner_email' => 'example@example.com',
	'vat_type' => 'included',
	'availability_image' => ''
));

$ecommerce->setPriceFormatData(array(
	'decimals' => 2,
	'decimal_sep' => '.',
	'thousands_sep' => '',
	'currency_to_right' => true,
	'currency_separator' => ' ',
	'show_zero_as' => '0',
	'currency_symbol' => '$',
	'currency_code' => 'USD',
	'currency_name' => 'United States of America, Dollars',
));

$ecommerce->setDigitalProductsData(array());
$ecommerce->setProductsData(array());
$ecommerce->setSlugToProductIdMap(array());
$ecommerce->setCategoriesData(array());
$ecommerce->setCommentsData(array(
	'enabled' => false,
	'type' => "websitex5",
	'db' => '',
	'table' => 'w5_9jip3mc6_products_comments',
	'prefix' => 'x5productPage_',
	'comment_type' => "commentandstars"
));
$ecommerce->setPaymentData(array(
	'8dkejfu5' => array(
		'id' => '8dkejfu5',
		'name' => 'Banka Transferi',
		'description' => 'Banka transferi ile daha sonra ödeyin.',
		'email_text' => 'Banka Havalesi ile ödeme yapmak için gerekli veriler:

 XXX YYY ZZZ

Lütfen dikkat, ödeme tamamlandıktan sonra dekontun bir kopyasını, sipariş numarası ile birlikte göndermeniz gerekmektedir.',
		'enableAfterPaymentEmail' => false
	)));
$ecommerce->setShippingData(array(
	'j48dn4la' => array(
		'id' => 'j48dn4la',
		'name' => 'Posta',
		'description' => 'Ürünler 3-5 gün içerisinde sevk edilecek.',
		'email_text' => 'Sevkiyat Posta.\\nÜrünler 3-5 gün içerisinde sevk edilecek.',
		'tracking_type' => 'none'
	),
	'hdj47dut' => array(
		'id' => 'hdj47dut',
		'name' => 'Hızlı Teslimat',
		'description' => 'Ürünler 1-2 gün içerisinde sevk edilecek.',
		'email_text' => 'Sevkiyat Hızlı Teslimat.\\nÜrünler 1-2 gün içerisinde sevk edilecek.',
		'tracking_type' => 'none'
	)));

/*
|-------------------------------------------------------------------------------------------
|	GUESTBOOK SETTINGS
|-------------------------------------------------------------------------------------------
*/

$imSettings['guestbooks'] = array();

/*
|-------------------------------------------------------------------------------------------
|	Dynamic Objects SETTINGS
|-------------------------------------------------------------------------------------------
*/

$imSettings['dynamicobjects'] = array(	'template' => array(
),
	'pages' => array(

	));


/*
|-------------------------------
|	EMAIL SETTINGS
|-------------------------------
*/

$ImMailer->emailType = 'phpmailer';
$ImMailer->exposeWsx5 = true;
$ImMailer->header = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">' . "\n" . '<html>' . "\n" . '<head>' . "\n" . '<meta http-equiv="content-type" content="text/html; charset=utf-8">' . "\n" . '<meta name="generator" content="Incomedia WebSite X5 Professional 2026.2.2 - www.websitex5.com">' . "\n" . '</head>' . "\n" . '<body bgcolor="#281F1A" style="background-color: #281F1A;">' . "\n\t" . '<table border="0" cellpadding="0" align="center" cellspacing="0" style="padding: 0; margin: 0 auto; width: 700px; border-collapse: separate;">' . "\n\t" . '<tr><td id="imEmailContent" style="min-height: 300px; font: normal normal normal calc(12pt - max(12pt - var(--min-text-size), 0pt) * var(--font-size-factor)) \'Inter\'; color: #55504D; background-color: #FFFFFF; text-decoration: none; text-align: left; width: 700px; border-style: solid; border-color: transparent transparent transparent transparent; border-top-width: 3px; border-right-width: 3px; border-bottom-width: 0; border-bottom: none; border-left-width: 3px;  padding-top: 25px;  padding-bottom: 25px; padding-left: 25px; padding-right: 25px;  background-color: #FFFFFF" width="700px">' . "\n\t\t";
$ImMailer->footer = "\n\t" . '</td></tr>' . "\n\t" . '<tr><td id="imEmailIcons" style="background-color: #FFFFFF;border-left: 3px solid transparent; border-right: 3px solid transparent; border-bottom-style: solid; border-bottom-color: transparent; border-bottom-width: 3px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;  padding-top: 25px;  padding-bottom: 25px; padding-left: 15px; padding-right: 15px;  text-align: center;  min-height: 300px; " width="700"></td></tr>' . "\n\t" . '</table>' . "\n" . '<table width="100%"><tr><td id="imEmailFooter" style="font: normal normal normal calc(12pt - max(12pt - var(--min-text-size), 0pt) * var(--font-size-factor)) \'Inter\'; color: #FFFFFF; background-color: #281F1A; text-decoration: none; text-align: center;  margin-top: 5px; padding-top: 25px;  padding-bottom: 25px; padding-left: 25px; padding-right: 25px; background-color: #281F1A">' . "\n\t\t" . 'Bu e-posta sadece yukarıda belirtilen adres için amaçlanan bilgileri içerir.<br>Eğer bu e-postayı yanlışlıkla aldıysanız, gönderen kişiye derhal bildiriniz ve kopyalamadan yok ediniz.' . "\n\t" . '</td></tr></table>' . "\n\t" . '</body>' . "\n" . '</html>';
$ImMailer->bodyBackground = '#FFFFFF';
$ImMailer->bodyBackgroundEven = '#FFFFFF';
$ImMailer->bodyBackgroundOdd = '#F0F0F0';
$ImMailer->bodyBackgroundBorder = '#CDCDCD';
$ImMailer->bodyTextColorOdd = '#55504D';
$ImMailer->bodySeparatorBorderColor = '#55504D';
$ImMailer->emailBackground = '#281F1A';
$ImMailer->emailContentStyle = 'font: normal normal normal calc(12pt - max(12pt - var(--min-text-size), 0pt) * var(--font-size-factor)) \'Inter\'; color: #55504D; background-color: #FFFFFF; text-decoration: none; text-align: left; ';
$ImMailer->emailContentFontFamily = 'font-family: Inter;';

// End of file x5settings.php