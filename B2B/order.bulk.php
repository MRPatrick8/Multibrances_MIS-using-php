<?php
include('config.php');
include('session.control.php');

require_once('product.class.php');
$newProduct = new product();

require_once('outlet.class.php');
$newOutlet = new outlet();

$productCategory = array(
	1=>"Vodka",
	2=>"Scotch Whisky",
	3=>"Irish Whisky",
	4=>"Wines",
	5=>"London Gin",
	6=>"Cofee Liqueur",
	7=>"Rum",
	8=>"Coconut Liqueur",
	9=>"Cognac",
	10=>"Champagne",
	11=>"Tequila",
	12=>"Pastis",
	13=>"Single Malt Scotch Whisky",
	14=>"Indian Whisky"
	);
if($cu_is_outlet) //User 1
	{
	$_REQUEST['outlet'] = $cu_id;
	}
if(!empty($_REQUEST['outlet'])) // Other users
	{
	$newOutlet->getOutlet($_REQUEST['outlet']);
	}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta http-equiv="pragma" content="no-cache">
<title>Tianis Direct - Bulk Order</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<noscript>
<p>Please enable JavaScript in your browser for use of the website.</p>
</noscript>
<link rel="shortcut icon" href="images/icon/favicon-96x96.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/main.css">
<style>
html {
	scroll-behavior: smooth;
	background-color: transparent;
}
</style>
<script>
	var view = 
		[		
		<?php 
		$whereCritere = '';
		$orderByCritere = ' category_product, serial_product, name_product ';
		$arrProduct = $newProduct->getAllProduct($whereCritere,$orderByCritere);
		
		if(!empty($arrProduct))
			{
			$i=0; 
			while(!empty($arrProduct[$i]))
				{$k=$i+1; 
			
				$price_display = $arrProduct[$i]->price_offtrade_product;
				if($newOutlet->type_outlet == 'Ontrade')
					{
					$price_display = $arrProduct[$i]->price_ontrade_product;
					}
				
				echo '{
					"Item":"'.$arrProduct[$i]->size_product.' '.$arrProduct[$i]->name_product.'",
					"Category":"'.strtoupper($productCategory[$arrProduct[$i]->category_product]).'",
					"Caption":"'.$arrProduct[$i]->carton_product.' / '.$arrProduct[$i]->serial_product.'",
					"ItemImageURL":"images/product/'.$arrProduct[$i]->serial_product.'.jpg",
					"Price":"'.$price_display.'",
					"Veg":"",
					"IdItem":"'.$arrProduct[$i]->id.'",
					"Available":"Yes"}';

				$i++;
				if(!empty($arrProduct[$i]))
					{
					echo ', ';
					}
				}
			}
		?>
		];
	
var iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);
//$("#tres_href").prop('disabled', true);
var waddr = "";
var cartM = "";
var cartV = 0;
var catArray = [];
var payMode = "Cash on Delivery/ by Cheques/ or via MoMo on Tiani`s account *182*8*1*028636#";
var payNote = "";
var lang = 'en';
var perC = "0%";
perC = cleanP(perC);

function cleanP(perC2)
	{
	if(perC2.indexOf("%") > -1) 
		{
		perC2.replace("%","").replace(" ", "");
		return 1+(parseInt(perC2)/100);
		} 
	else 
		{
		return 1;
		}
	}

var amtPayable = 0;
var delC = 0;
 
var blurred = false;

window.onblur = function() 
	{
	blurred = true; 
	}

window.onfocus = function() 
	{ 
	blurred && (ifAt()); 
	}

function toTitle(str) 
	{
	return str.replace(/(?:^|\s)\w/g, function(match) 
		{
		return match.toUpperCase();
		});
	}
 
function urlencode(str) 
	{
	str = (str + '')
	return encodeURIComponent(str)
	.replace(/!/g, '%21')
	.replace(/'/g, '%27')
	.replace(/\(/g, '%28')
	.replace(/\)/g, '%29')
	.replace(/\*/g, '%2A')
	.replace(/~/g, '%7E')
	.replace(/%20/g, '+')
 	} // end of urlencode
 
function ifAt()
	{
	if(cartArray.length<1)
		{
		//location.reload(true);
		console.log('refreshed');
		}
	}

function showStext()
	{
	$("input#mshop_search").val('');
	$("li.tres_itemimage").show();
	$("#catList").toggle();
	$("#mshop_searchdiv").toggle();
	$("#items .title").toggle();
	$("input#mshop_search").focus();
	}
 
function checkIt()
	{
	//alert(cartV);
	if('yes' == 'no')
		{
		//shop closed
		notifyC("Please note the shop is closed!", "info");
		}
	if(cartV < 1)
		{
		// minimum order value
		notifyC("Your cart is empty!", "warning");
		return false; 
		}
	else 
		{
		if(cartArray.length<1)
			{
			//check cart
			notifyC("Please check cart", "warning");
			return false;
			} 
		}
	}
 
$(document).ready(function()
	{
	//var template = Handlebars.compile($('#item-template').html());
	//$('#items').html(template(view));
	
	if(localStorage.tres_address) 
		{
		document.getElementById("mshop_place").value = toTitle(localStorage.tres_address);
		//waddr = toTitle(localStorage.tres_address);
		}
	
	$.each(view, function (index) 
		{
		var categ = view[index].Category;
		if($.inArray(categ, catArray) == -1) 
			{
			catArray.push(categ);
			}
		});

	var $catTab = $("#catList");
	$.each(catArray, function (i) 
		{
		$catTab.append('<li><a style="color:#e60b1e;" href="#' + catArray[i].replace(/\s+/g,"-") + '">' + catArray[i] + '</a></li>');
		});

	var gview = view.reduce(function(result, current) 
		{
		result[current.Category] = result[current.Category] || [];
		result[current.Category].push(current);
		return result;
		}, {});

	var gmenu = "";
	var suf = "";

	$.each(gview, function(gindex) 
		{
		gmenu += '<h3 style="margin-top:20px;" class="title is-5" id='+ gindex.replace(/\s+/g,"-") +'>' + gindex + '</h3>';
		$.each(gview[gindex], function(ggindex) 
			{
			if((this.Available).trim().toLowerCase()=="yes")
				{
				var veg = (this.Veg).trim().toLowerCase();
				if(veg==="yes")
					{
					suf='<span style="font-size:1.1em;color:#439547;">&#9679</span>';
					} 
				else if(veg==="no")
					{
					suf='<span style="font-size:1.1em;color:#BF360C;">&#9679</span>';
					}
				else 
					{
					suf = "";
					}
				gmenu += '<li class="box is-marginless tres_itemimage" style="background-image: url('+this.ItemImageURL+'); margin-top:5px !important;" data-item='+toTitle(this.Item)+' data-price='+this.Price+'><a onClick="javascript:updateC(\''+toTitle(this.Item)+'\', 1, '+this.Price.replace(/,/g, "")+' , '+this.IdItem+');" style="padding-top:0px;" class="mitem is-success is-pulled-right"><i style="color:#e60b1e;" class="far fa-2x fa-plus-square"></i></a><span class="is-pulled-right" style="padding-right:15px;padding-top:4px;"><span class="is-size-7 has-text-black-light">RWF</span> '+this.Price+' </span><div style="padding-left:2px;"><b>'+suf+''+toTitle(this.Item)+'</b><br/><small>'+this.Caption+'</small></div></li>';
				}
			});
		});
	//console.log(gmenu);

	document.getElementById("items").innerHTML = gmenu;
	$("#tres_href").removeClass("is-loading");
	$("#tres_refresh").hide();
	$("#tres_refresh").click(function()
		{
		$("#tres_refresh").hide();
		location.reload(true);
		}); // toggle click to refresh
	
	jQuery.expr[':'].icontains = function(a, i, m) 
		{
		return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
		};

	$("input#mshop_search").keyup(function(){
		$("li.tres_itemimage").show();
		if((this.value).trim() !== "")
			{
			$("li.tres_itemimage:not(:icontains("+this.value+"))").hide();
			if($('#items li:visible').length == 0)
				{
				notifyC("0 items", "warning");
				}
			}
		}); 

	}); // end of document ready

</script>
<style>
.tres_itemimage {
	background-repeat: no-repeat;
	background-position: 5px;
	background-size: 48px auto;
	padding-left: 70px;
	padding-top: 30px;
}
#tres_refresh {
	min-width: 150px;
	margin-left: -75px;
	position: fixed;
	z-index: 1;
	left: 50%;
	bottom: 70px;
}
.right {
	font-size: 20px;
	margin-left: 5px;
	float: right;
	color: #e60b1e;
	margin-right: 20px;
	font-family: Gill Sans MT;
}
.title {
	font-size: 25px;
}
@media only screen and (max-width: 700px) {
.title {
	font-size: 17px;
}
.right {
	font-size: 15px;
	margin-left: 5px;
	float: right;
	margin-right: 20px;
	font-family: Gill Sans MT;
}
.media-left {
	width: 90px;
}
}
@media only screen and (min-width: 1024px) {
.title {
	font-size: 25px;
}
}
</style>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if(restore) selObj.selectedIndex=0;
}
</script>
</head><body>
<div id="footsum" class="card" style="min-width:100%; z-index:100; padding:10px 30px; position:fixed; bottom:0px;display:none;">
  <div id="tres_footsum" class="is-pulled-left" style="margin-top: calc(.300em - 1px);"></div>
  <div class="is-pulled-right"><a href="#tres_orderbox" class="button is-success"><i class="has-text-white fas fa-shopping-cart"></i></a></div>
</div>
<div class="mobile-container">
  <div style="padding-top:10px;padding-bottom:15px;">
    <div class="topnav"> <a href="<?php if(!$cu_is_outlet){ ?>dashboard.php<?php } else {echo "#";}?>">Tianis Direct</a>
      <?php if(!$cu_is_outlet){ ?>
      <div id="myLinks"> <a href="order.php" class="active"><i class="fas fa-receipt"></i>&nbsp;Orders</a> <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> <a href="outlet.php"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a> <a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a> <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a> </div>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a>
      <?php }?>
    </div>
    <div>
      <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
    </div>
    <?php 
        if(empty($_REQUEST['outlet']))
            {
        ?>
    <div class="_whiteBox"> 
    
    <table width="100%" border="0" cellspacing="10" cellpadding="10">
  <tr>
    <td><strong><i class="fas fa-store-alt"></i>&nbsp;Choose an outlet:</strong></td>
  </tr>
  <tr>
    <td><select class="btn" onChange="MM_jumpMenu('parent',this,0)">
        <option></option>
        <?php 
$viewPage = 1;
$viewLimit = 10000;
$whereCritere = '';
$orderByCritere = ' name_outlet ';
$arrOutlet = $newOutlet->getAllOutlet($whereCritere,$orderByCritere,$viewPage,$viewLimit);

if(!empty($arrOutlet))
	{
	$i=0; 
	while(!empty($arrOutlet[$i]))
		{ 
            ?>
        <option value="?outlet=<?php echo $arrOutlet[$i]->id; ?>"><?php echo $arrOutlet[$i]->name_outlet.' ('.$arrOutlet[$i]->location_outlet.')'; ?></option>
        <?php 
                    $i++;
                    }
                }
            ?>
      </select></td>
  </tr>
</table>
    </div>
    <?php
            } 
        else
            {
        ?>
    <div>
      <h3 class="subtitle"><strong>
        <?php 
		if(!empty($_REQUEST['outlet']))
			{
			?>
        <i class="fas fa-receipt"></i>&nbsp;Order for
        <?php 
			echo $newOutlet->name_outlet.' ('.$newOutlet->location_outlet.')';
			} 
		?>
        </strong></h3>
      <!--
        <a class="has-text-black" href="order.php">
        <button class="btn" title="View My Orders" type="button"><i class="fas fa-folder-open"></i>&nbsp;View My Orders</button>
        </a> | <a class="has-text-black" href="#">Pending (0)</a>
        --> 
    </div>
  </div>
  <section class="section" style="padding:0px;">
    <div class="container" style="max-width:800px">
      <div class="columns">
        <div class="column is-two-thirds">
          <div class="tabs has-background-white" style="z-index:100;position:-webkit-sticky;position:sticky;top:0;border-top:#000 solid 1px;">
            <div id="mshop_searchdiv" class="tabs" style="display:none; margin-bottom:0rem; width:100%;">
              <input name="mshop_search" id="mshop_search" type="text" style="width:100%;border:0;padding-left: calc(.625em - 1px);" placeholder="Type search text here...">
              <a onclick="showStext();">X</a></div>
            <ul id="catList">
              <li style="z-index:100;position:-webkit-sticky;position:sticky;left:0;"><a style="border-style:none;" onclick="showStext();"><i class="fa fa-search"></i></a></li>
              <!-- li class="is-active"><a>All</a></li -->
            </ul>
          </div>
          <div id="items">Loading ...</div>
        </div>
        <div class="column"> 
          <!--<div id="addr" class="box has-background-white">
          <h2 class="subtitle" style="margin-bottom:0.5rem;">Name & Delivery Address</h2>
          <small class="has-text-grey-light">Only name, if pick-up</small>
          <textarea name="address" rows="2" class="textarea" id="mshop_place" placeholder="Your Name, Area, Kigali" onChange="updateClientAddress();">Kigali</textarea>
        </div>-->
          <form action="order.sql.php?action=5" method="post" onSubmit="return checkIt();">
            <div id="tres_orderbox" class="box has-background-white">
              <h3 class="subtitle">Order for:<br>
                <strong><i class="fas fa-store-alt"></i>&nbsp;
                <?php if(!empty($_REQUEST['outlet'])){echo $newOutlet->name_outlet.' ('.$newOutlet->location_outlet.')';} ?>
                </strong></h3>
              <div class="tile is-parent is-vertical" style="padding:0rem;" id="tres_cart">
                <p class='has-text-centered'>Your cart is empty</p>
              </div>
              <!-- end of cart div -->
              <input name="tres_whatsapp" type="hidden" id="tres_whatsapp" value="" >
              <input name="txt_outlet" type="hidden" value="<?php if($cu_is_outlet){echo $cu_id;}elseif(!empty($_REQUEST['outlet'])){echo $_REQUEST['outlet'];} ?>">
              <input name="txt_user" type="hidden" value="<?php if($cu_is_outlet){echo '0';} else {echo $cu_id;} ?>">
              <div> 
                <!--<hr>
              <a id="tres_href" target="_blank" onClick="return checkIt();" class="button is-medium is-fullwidth is-success">Send Order</a>-->
                <hr>
                <button class="button is-medium is-fullwidth is-success" type="submit" name="cmd_submit">Send Order</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script>

/*function mypopup()
{
mywindow = window.open("http://tianis.rw", "mywindow", "location=1,status=1,scrollbars=1,  width=100,height=100");
mywindow.moveTo(0, 0);
}


$('a.yourlink').click(function(e) {
e.preventDefault();
window.open('http://tianis.rw');
//window.location.replace('http://tianis.rw');
});
*/
function updateClientAddress() 
	{
	//localStorage.tres_address = toTitle(document.getElementById("mshop_place").value);
	//waddr = toTitle(document.getElementById("mshop_place").value);
	//upLink();
	}


function notifyC(themsg,ntype)
	{
	//$("#notification").clearQueue();
	$("#notification").finish();
	$("#notification").html(themsg);
	$("#notification").removeClass();
	$("#notification").addClass("notification");
	$("#notification").addClass("is-"+ntype);
	$("#notification").fadeIn().delay(800).fadeOut("slow");
	}

var cartArray = [];

function deleteRow(arr, row) 
	{
	arr = arr.slice(0); // make copy
	arr.splice(row, 1);
	return arr;
	}

function updateC(itm, qty, rte, idItem=0)
	{
	
	var newA =[itm,qty,rte,idItem];
	const arrayColumn = (arr, n) => arr.map(x => x[n]);
	cartV = 0;
	cartM = "";
	var exists = false;
	
	
	$.each(cartArray, function (i) 
		{ 
		if(cartArray[i][0].toLowerCase() == newA[0].toLowerCase())
			{	
			cartArray[i][1] += newA[1];
			exists = true;
			if(cartArray[i][1]<1)
				{
				cartArray = deleteRow(cartArray, i);
				return false;
				}
			}
		});

	if(!exists) 
		{
		cartArray.push(newA);
		}
	
	//console.log(arrayColumn(cartArray, 1).reduce((a, b) => a + b, 0)+' items');
	
	document.getElementById('tres_cart').innerHTML = "";
	
	$.each(cartArray, function (i) 
		{
		if(cartArray[i][1]>0)
			{
			document.getElementById('tres_cart').innerHTML += '<div class="panel-tabs is-fullhd is-size-6"> <a class="is-pulled-left has-text" style="color:#e60b1e;" onClick="updateC(\''+ cartArray[i][0] + '\',-1,'+ cartArray[i][1] + ');"><i class="far fa-2x fa-minus-square"></i></a><span style="width:100%;padding:13px 2px;">' + '<b class="tag is-medium is-light is-rounded">'+ cartArray[i][1] + '</b> x '+ cartArray[i][0] + '<input name="txt_product[]" type="hidden" value="'+ cartArray[i][3] + '"><input name="txt_quantity[]" type="hidden" value="'+ cartArray[i][1] + '"></span> <a class="is-pulled-right has-text" style="color:#e60b1e;" onClick="updateC(\''+ cartArray[i][0] + '\',1,'+ cartArray[i][1] + ');"><i class="far fa-2x fa-plus-square"></i></a> </div><!--hr style="margin: 1rem 0;"/-->';
			cartV += (cartArray[i][1] * cartArray[i][2]);
			cartM += cartArray[i][1] + " x " + cartArray[i][0] + "\r\n";
			}
		});

	if(cartV > 0)
		{
		var delC = 0.00;//delC = delC.replace(/,/g, "");
		delC = parseFloat(delC);
		
		amtPayable = ((cartV+delC)*perC).toFixed(2);
		
		$('#footsum').show();
		document.getElementById('tres_footsum').innerHTML = '<span class="tag is-rounded is-light is-size-6 has-text-weight-bold">'+arrayColumn(cartArray, 1).reduce((a, b) => a + b, 0)+'</span> · <small class="is-size-7 has-text-black">RWF '+amtPayable+'</small>';
		
		//cart total footer below
		document.getElementById('tres_cart').innerHTML += "<div class='is-fullhd'><hr style='margin:1rem 0;color:#fff;'/><span class='has-text-weight-bold is-pulled-left'>Payable <small class='has-text-weight-light'>&nbsp;</small></span><span class='has-text-weight-bold is-pulled-right'>RWF "+amtPayable+"</span></div><br/><span class='has-text-grey is-size-7'>Your order is ready to be sent.</span>";
		} 
	else 
		{
		// your cart is empty
		document.getElementById('tres_cart').innerHTML += '<p class="has-text-centered">Your cart is empty</p>';
		$('#footsum').hide();
		}
		
		// waddr = encodeURI(toTitle(document.getElementById("mshop_place").value));
		
		//upLink();
		// update cart
		notifyC("Cart updated", "info");
	
	} // end of updateC

function thePaynote(pMode,pNote,pValue)
	{
	var pCur = 'RWF';
	var payN = "You can pay in Cash on delivery, by Cheque or via Momo on our account:*182*8*1*028636#";
	
	switch(pMode) 
		{
		case 'Show Note':
			payN = pNote;
			break;
		case 'Mobile Money':
			payN = "You can pay in cash on delivery, by cheques or /"+pNote+'/'+pValue;
			payN += '%0APlease share the payment screenshot here.';
			break;
		case 'USSD - Rwanda':
			var ussdrw = 'amt='+pValue+'&ussdid='+pNote;
			ussdrw = escape(encodeURI(ussdrw));
			payN = 'Click to pay using thru USSD%0Ahttps://tianis.rw/p/ussdrw.php?'+ussdrw;
			payN += '%0APlease share the payment screenshot here.';
			break;
		case 'UPI - Rwanda':
			var upivar = "pn= Tiani's Wine & Spirits&pa="+pNote+'&tn=tianis&am='+pValue+'&cu=RWF';
			//console.log(escape(encodeURI(upivar)));
			upivar = escape(encodeURI(upivar));
			//upivar = upivar.replace(/&/g,'%26');
			payN = 'Click to pay using UPI%0Ahttps://tianis.rw/p/upiin.php?'+upivar;
			payN += '%0APlease share the payment screenshot.';
			break;
		case 'Payment link':
			payN = 'Please pay using this payment link and share the payment screenshot.%0A'+pNote;
			break;
		case 'Append Amount to Link':
			payN = 'Please pay using this payment link and share the payment screenshot.%0A'+ escape(encodeURI(pNote+pValue));
			break; 
		} // end of payment mode switch
 
	return payN;
	}
 
function upLink()
	{
	var wlink = "https://api.whatsapp.com/send?phone=+250733475150&text=New order (Tiani's Wine and Spirits)%0A%0A" + urlencode(cartM) + "%0APayable: RWF " + amtPayable + "%0A";
	wlink += "%0ADeliver to:"+' '+toTitle('').replace(/\x26/,"%26").replace(/\x23/,"%23");
	if(wlink !== "") 
		{
		wlink += "%0A"+thePaynote(payMode,payNote,amtPayable);
		}
	document.getElementById("tres_whatsapp").value = wlink;
	document.getElementById("tres_href").setAttribute('href', wlink);
	
	} // end of upLink
 
</script> 
  <script>
function myFunction() 
	{
	var x = document.getElementById("myLinks");
	if(x.style.display === "block") 
		{
		x.style.display = "none";
		} 
	else 
		{
		x.style.display = "block";
		}
	}
</script>
  <div id="notification" class="notification" style="display:none;position:fixed;top:0px;width:100%;z-index:105;"></div>
  <center>
    <div id="tres_refresh" class="is-info tag is-size-6"> <a class="has-text-white" href="">Click to refresh</a> </div>
  </center>
  <?php
         
            }
        ?>
  <br>
  <p align="center" class="has-text-black">Copyright &copy; 2020. All rights reserved</p>
  <br>
</div>
</body>
</html>