<?php
include'connection.php';
$do=mysqli_query($conn, "SELECT *FROM `account` WHERE `Status` = '0' AND `number`='$code' ORDER BY `number` ASC LIMIT 80");   
				if($fo=mysqli_num_rows($do)){

		print("<html>
<head>
<title>$cna</title>
</head>
<body>");

	$n=0;
	print("<style type=text/css>
@media screen {
  .DONTPrinti{ display:none;
  margin-top: 0mm; margin-bottom: 0mm; 
           margin-left: 0mm; margin-right: 0mm }
			}
@media print {
  .DONTPrint{ display:none }
  .DOCheck{ display:table}
			}
</style>
	<script type='text/javascript'>
	function printpage()
  {  
window.print();
  } 
</script>");
					
		$n=1;		
		while($ro=mysqli_fetch_assoc($do)){
$code=$ro['number'];
$idno=$ro['idno'];
$ville=$ro['aville'];
$photo=$ro['photo'];
$perm=$ro['permis'];
$date=date("d-m-Y", strtotime($ro['date']));
$sexe=$ro['sexe'];
$ucode=$ro['Code'];
$sexe=substr("$sexe", 0, 1);
$nation=$ro['nationalite'];
$profes=$ro['profession'];
	$prove=$_SESSION['Prove'];


				$telo=$ro['contact'];
				$nom=$ro['nom'];
				$postnom=$ro['postnom'];
				$prenom=$ro['prenom'];
				$cata=$ro['cata'];
				$catb=$ro['catb'];
				$catc=$ro['catc'];
				$catd=$ro['catd'];
				$cate=$ro['cate'];
				if($ro['Printed']==2)
					$c="- C";
				else
					$c="";
		
$stl="style='padding:0px;'";
$stat=$ro['Status'];
$cdat=$ro['Cdate'];	
$cdat = strtotime("-1 day", strtotime("$cdat"));
$cdat = date ("Y-m-d", $cdat);
$mt=date("m", strtotime($cdat));
$dt=date("d", strtotime($cdat));
$yr=date("Y", strtotime($cdat));
$mont=$month[$mt];

$dti=$dt;
$yri=$yr+$vcard;

if($stat=='2'){
	$brd="border:1px solid #ff0066";
}
else
	$brd="border:1px solid $cls";

$chef=mysqli_query($conn, "SELECT `Chef` FROM `provinces` WHERE `Province`='$prove'");
$ref=mysqli_fetch_assoc($chef);
$cheif=$ref['Chef'];

				print("<div class='DONTPrinti' style='margin-top:0px; position:relative;'><center>
		<button type='$dbutn' name='open' class='btn btn-lg btn-block btn-default' style='margin-bottom:20px; height:245px; 
			font-size:14px; background-color:#000066; border-radius:5px; $brd' title='Cliquer pour imprimer la carte' data-toggle='tooltip' data-placement='top'>
			<img src='imgs/header.JPG' width='96%' height='60' border='0' alt=''><br>
			<span style='margin-left:10px; font-size:8px; float:left; text-align:left; margin-top:5px; width:auto; 
			padding-right:10px;'> CARTE D'IDENTIFICATION DE TRANSPORTEUR ROUTIER N° $ucode </span>
			<span style='margin-top:10px; margin-left:0px; width:40px; margin-bottom:-10px;'> &nbsp;&nbsp; </span>

			
			<div style='width:96%; height:90px; background-color:#ffffff; margin-left:10px;'>
			<table width='100%' style='color:#000000; font-size:10px; font-weight:bold;'>
			<tr style='color:#ff0000; height:5px;'>
			
			<td rowspan='6' width='20%' $stl><img src='files/$photo' width='85' height='85' border='0' alt=''></td>
			<td width='20%' $stl> Nom </td><td width='20%' $stl><center> Sexe </td><td width='20%' $stl> Nationalité </td>
			<td width='20%' $stl><center> Profession </td></tr>

			<tr style='height:5px;'><td style='text-align:left; padding:1px; font-size:8px;'>$nom $postnom $prenom </td>
			<td style='text-align:left; padding:1px; font-size:8px;'> $sexe </td><td $stl> $nation </td><td $stl><center> $profes </td></tr>
			
			<tr style='color:#ff0000; height:5px;'><td $stl> Affectation </td><td colspan='2' $stl> N° Permis de Conduire </td>
			<td style='color:#ff0000;padding:1px;'><center>Catégorie</td></tr>

			<tr style='height:5px;'><td $stl>&nbsp;&nbsp;Transport en Commun </td><td colspan='2' $stl> $perm </td><td style='color:#00cc00;padding:1px;'><b>
			<center> $cata $catb $catc $catd $cate </b></td></tr>

			<tr style='height:5px;'><td colspan='4' style='text-align:left; padding:1px;'><font color='#ff0000'>&nbsp;&nbsp;Addresse: </font>
			<font color='#00cc00'> Ville de $ville. </font></td></tr>

			<tr style='height:5px;'><td align='right'><b><font style='font-size:14px;'>$ucode $c</font></b><td>
			<td colspan='3' style='text-align:left; padding:1px; font-size:8px'>
			<font color='#ff0000'>Date d'expiration: Le $dti $mont $yri </font></td></tr>
			
			</table>
			</div>

			<span style='margin-left:10px; font-size:8px; float:left; text-align:left; margin-top:5px; width:auto; 
			padding-right:10px;'>&nbsp;&nbsp;&nbsp;NN $idno <br><br><img alt='$idno' width='100' height='30' 
			src='barcode.php?codetype=Code39&size=30&text=$idno' /><br></span>

			<span style='float:right; border:0px solid red; margin-top:10px; margin-right:10px; font-size:8px; width:180px;'> 
			Fait à $ville, le $dt $mont $yr <br><br>
			<u>BOSS NABUHATU MUTEMBWE</u><br><br> Chef de Division Principale de Transport</span>

			
			</button>");
	$n++;

		}

	print("</div><div class='DONTPrint'>");

$so=mysqli_query($conn, "UPDATE `account` SET `Printed`='1' WHERE `Printed`!='1' AND `number`='$code' ORDER BY `number` ASC LIMIT 1");
	?>
	 <script type="text/javascript">
    window.print();
</script>
<?php
	echo"</body></html><div class='DONTPrint'>";
}
	$t=$p=50;
		?>
