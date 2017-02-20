<html>
<head>
	<title>EKONOMİ BOTU</title>
	<style type="text/css">
		body {
			background-color:#C9BDC3;

		}

		.geriplan {
			width:700;
			height:900;
			background-color:black;
			margin:0 auto;
			opacity:0.5;
			filter:alpha(opacity=60);
			color:red;
		}

		.yesilkuru {
			background-color:#207025;
			width:700px;
			height:40px;
			text-align:justify;
		}

		.yesilkuru h4 {
			color:white;
			font-family:Consolas;
			padding-top:10px;
			text-align:center;
		}

		.dolarkuru {
			width:170px;
			height:50px;
			background-color:#EA7909;
		}

		.dolarkuru h4 {
			color:white;
			font-family:Consolas;
			padding-top:13px;
			text-align:center;
		}

		.bol {
			width:700px;
			height:10px;
			background-color:#EA7909;
			margin-top:15px;
		}

		.eurokuru {
			width:170px;
			height:50px;
			background-color:#EA7909;
		}

		.eurokuru h4 {
			color:white;
			font-family:Consolas;
			padding-top:13px;
			text-align:center;
		}

		.bitcoinkuru {
			width:250px;
			height:50px;
			background-color:#F9D423;
			margin-top:10px;
		}

		.bitcoinkuru h4 {
			color:black;
			font-family:Consolas;
			padding-top:13px;
			text-align:center;
		}


	</style>
</head>
<body>

<?php
header('Content-Type: text/html; charset=utf-8');

function ara($bas, $son, $yazi)
{
    @preg_match_all('/' . preg_quote($bas, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $yazi, $m);
    return @$m[1];
}


$sitecek = file_get_contents('http://www.bigpara.com/doviz/');
$dolar = ara('<span class="value">', '</span>',$sitecek);
$euro = ara('<span class="value">', '</span>',$sitecek);

$sitebitcoin = file_get_contents('http://www.bigpara.com/bitcoin/');
$bitcoin = ara('<span class="value up">', '</span>', $sitebitcoin);

?>

<div class="geriplan">

	<div class="yesilkuru">
		<h4>DÖVİZ KURU</h4>
	</div>
	<div class="dolarkuru">
		<h4>ABD Doları <?php print_r($dolar[0]) ?></h4>
	</div>
	<div class="dolarkuru">
		<h4>ALIŞ(TL) :
			<?php
				$alis = $dolar[1];
				print_r($dolar[1])
			?>
		</h4>
	</div>
	<div class="dolarkuru">
		<h4>SATIŞ(TL) :
			<?php
				$satis = $dolar[2];
				print_r($dolar[2])
			?>
		</h4>
	</div>
	<div class="bol">
	</div>

		<div class="eurokuru">
		<h4>Euro <?php print_r($euro[3]) ?></h4>
	</div>
	<div class="eurokuru">
		<h4>ALIŞ(TL) :
			<?php
				print_r($euro[4])
			?>
		</h4>
	</div>
	<div class="eurokuru">
		<h4>SATIŞ(TL) :
			<?php
				print_r($euro[5])
			?>
		</h4>
	</div>

	<div class="yesilkuru">
		<h4>BİTCOİN KURU</h4>
	</div>

	<div class="bitcoinkuru">
		<h4>BİTCOİN</h4>
	</div>


	<div class="bitcoinkuru">
		<h4>BİTCOİN FİYAT(TL) : <?php print_r($bitcoin[0]) ?> </h4>
	</div>
</div>
</body>
</html>
