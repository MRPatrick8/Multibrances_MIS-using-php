<?php
if(basename($_SERVER['PHP_SELF']) == 'homepage.php') {
  $co=" class='current'";
} else {
  $co="";
} 
include'header.php';
?>
<script src="style/chart.min.js"></script>  
        <!-- Statistics -->
                <div class="row">
          <div class="col-lg-12"><center>

		<?php
			include'divhome.php';
		?>

            

            </div>
        </div>        <!-- End Statistics -->




<?php
// ************************************************** Second division ***************************************************
?>



<br><hr width='97%'>
        
        <div class="row">
          <div class="col-lg-12 hidden-print">             
		
				<div class="col-md-11 hidden-print" style='color:#66cc66; border:0px solid #ffffff;'>
			<label style='padding-left:40px; font-size:14px;'>Termes et conditions</label>
		<div class="widget-container stats-container" style="border-radius:5px; height:220px; padding-top:20px; border:1px solid #ffffff;">
               			
                <div class="text hidden-print" style='font-size:16px; margin-top:0px; text-align:left; border:0px solid blue;'>
				
	<div class="col-lg-7 hidden-print" style='border:0px;'>
	<div style="width:100%; padding:10px 20px 10px 20px; height:180px; overflow:auto; border:1px solid #cccccc; font-size:11px; 
	color:#cccccc; margin: 0px 0px 0px 0px; border-radius:5px; border:0px;">
Termes et conditions ("Termes")<br><br>

Dernière mise à jour: <?php echo $Date ?><br><br>

Veuillez lire attentivement les présentes conditions générales ("Termes", "Conditions générales") avant d'utiliser ce système initialisé par T-KAY IT & Software Developers.<br>

Votre accès et votre utilisation du Service sont conditionnés par votre acceptation et votre respect des présentes Conditions. Ces conditions s'appliquent à tous les visiteurs, utilisateurs et autres personnes qui accèdent ou utilisent le service.<br>

En accédant ou en utilisant le Service, vous acceptez d'être lié par ces Conditions. Si vous n'êtes pas d'accord avec une partie des conditions, vous ne devriez pas accéder au Service.<br><br>

<b>Achats</b><br>

Si vous souhaitez acheter un produit ou un service mis à disposition via le Service ("Achat"), il peut vous être demandé de fournir certaines informations relatives à votre Achat, y compris, sans limitation, votre …<br>

La section Achats est destinée aux entreprises qui vendent en ligne (physique ou numérique). Pour la section de divulgation complète, créez vos propres conditions générales.<br><br>

<b>Abonnements</b><br>

Certaines parties du Service sont facturées sur la base d'un abonnement (« Abonnement(s) »). Vous serez facturé à l'avance sur une période récurrente ...<br>

La section Abonnements est destinée aux entreprises SaaS. Pour la section de divulgation complète, créez vos propres conditions générales.<br><br>

<b>Contenu</b><br>

Notre Service vous permet de publier, de lier, de stocker, de partager et de mettre à disposition certaines informations, textes, graphiques, vidéos ou autre matériel (« Contenu »). Vous êtes responsable du …<br>

La section Contenu est destinée aux entreprises qui permettent aux utilisateurs de créer, modifier, partager, créer du contenu sur leurs sites Web ou applications. Pour la section de divulgation complète, créez vos propres conditions générales.<br><br>



<b>Liens vers d'autres sites Web</b><br>

Notre service peut contenir des liens vers des sites Web ou des services tiers qui ne sont pas détenus ou contrôlés par My Company.<br><br>

Ma société n'a aucun contrôle sur le contenu, les politiques de confidentialité ou les pratiques de tout site Web ou service tiers et n'assume aucune responsabilité pour celui-ci. Vous reconnaissez et acceptez en outre que My Company (modifiez cela) ne sera pas responsable, directement ou indirectement, de tout dommage ou perte causé ou prétendument causé par ou en relation avec l'utilisation ou la confiance accordée à un tel contenu, biens ou services disponibles sur ou via de tels sites Web ou services.<br><br>

<b>Modifications</b><br>

Nous nous réservons le droit, à notre seule discrétion, de modifier ou de remplacer ces Conditions à tout moment. Si une révision est importante, nous essaierons de fournir un préavis d'au moins 30 jours avant que de nouvelles conditions n'entrent en vigueur. Ce qui constitue un changement important sera déterminé à notre seule discrétion.<br><br>


Si vous avez des questions concernant ces Conditions, veuillez nous contacter.

        </div>
		</div>

		<div class="col-lg-1 hidden-print" style="text-align:center; padding:10px;">   </div>
				  
<div class="col-lg-4 hidden-print" style="text-align:center; margin-top:-60px; padding:10px;">
				 <?php
				 if($_SESSION['Access']>='1'){
					 ?>
                <canvas id="line-chart" width="980" height="600"></canvas><br><br>
<script>
				new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [1,2,3,4,5,6,7,8,9,10,11,12],
    datasets: [{ 
        data: [86,114,106,106,107,111,133,221,783,2478,2491,2254],
        label: "A",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [282,350,411,502,635,809,947,1402,3700,5267,5675,5897],
        label: "B",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [168,170,178,190,203,276,408,547,675,734,790,932],
        label: "C",
        borderColor: "#3cba9f",
        fill: false
      }, { 
        data: [40,20,10,16,24,38,74,167,508,784,813,987],
        label: "D",
        borderColor: "#e8c3b9",
        fill: false
      }, { 
        data: [6,3,2,2,7,26,82,172,312,433,876,1209],
        label: "E",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: "Tableau descriptif"
    }
  }
});
		</script>
		
		<?php
				}
					 ?>
		</div>
                </div>
              </div>
			 </div>       
          
        </div>  </div>  
	

<?php
include'footer.php';
?>
