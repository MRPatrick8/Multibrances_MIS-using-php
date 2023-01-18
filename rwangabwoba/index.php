<!DOCTYPE html>
<html>
<head><meta charset="euc-jp">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv="expires" content="0">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="refresh" content="1800">

 <title>RWANGABWOBA WINES & lIQUOR-Order on WhatsApp</title>

  <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">

  <noscript><p>Please enable JavaScript in your browser for use of the website.</p></noscript>

<script>
var view = [
{"Item":"750 ml ABSOLUT VODKA","Category":"BASE LIQUORS","Caption":"750 ml","ItemImageURL":"images/12.jpg","Price":"11,000","Veg":"","Available":"Yes"},
{"Item":"1L ABSOLUT CITRON","Category":"BASE LIQUORS","Caption":"1L","ItemImageURL":"images/7.jpg","Price":"25,000","Veg":"","Available":"Yes"},
{"Item":"1L Jameson Whiskey","Category":"BASE LIQUORS","Caption":"750 ml","ItemImageURL":"images/4.jpg","Price":"30,000","Veg":"","Available":"Yes"},
{"Item":"350 ml Jameson Whiskey","Category":"BASE LIQUORS","Caption":"750 ml","ItemImageURL":"images/2.jpg","Price":"12,000","Veg":"","Available":"Yes"},
{"Item":"1L Jack Daniels","Category":"BASE LIQUORS","Caption":"1L","ItemImageURL":"images/15.jpg","Price":"50,000","Veg":"","Available":"Yes"},
{"Item":"1L Gordon`s","Category":"BASE LIQUORS","Caption":"750 ml","ItemImageURL":"images/5.jpg","Price":"25,000","Veg":"","Available":"Yes"},
{"Item":"1L Camino","Category":"BASE LIQUORS","Caption":"1L ","ItemImageURL":"images/1.jpg","Price":"25,000","Veg":"","Available":"Yes"},
{"Item":"1L Beefeater","Category":"BASE LIQUORS","Caption":"1L ","ItemImageURL":"images/6.jpg","Price":"20,000","Veg":"","Available":"Yes"},
{"Item":"1L Black Label 12","Category":"BASE LIQUORS","Caption":"1L ","ItemImageURL":"images/9.jpg","Price":"55,000","Veg":"","Available":"Yes"},
{"Item":"750 ml Imperial Blue","Category":"BASE LIQUORS","Caption":"750 ml ","ItemImageURL":"images/11.jpg","Price":"7,000","Veg":"","Available":"Yes"},
{"Item":"750 ml Bazooka Gold","Category":"BASE LIQUORS","Caption":"750 ml ","ItemImageURL":"images/10.jpg","Price":"7,000","Veg":"","Available":"Yes"},


{"Item":"1L Amarula","Category":"LIQUEURS","Caption":"1L","ItemImageURL":"images/3.jpg","Price":"30,000","Veg":"","Available":"Yes"},

{"Item":"1L Baileys","Category":"LIQUEURS","Caption":"1L","ItemImageURL":"images/8.jpg","Price":"41,000","Veg":"","Available":"Yes"},


{"Item":"Nederburg","Category":"WINES","Caption":"1L","ItemImageURL":"images/13.jpg","Price":"17,000","Veg":"","Available":"Yes"},
{"Item":"5L Cellar Cask","Category":"WINES","Caption":"5L","ItemImageURL":"images/17.jpg","Price":"35,000","Veg":"","Available":"Yes"},
{"Item":"5L Drostdy Hof","Category":"WINES","Caption":"5L","ItemImageURL":"images/14.jpg","Price":"35,000","Veg":"","Available":"Yes"},
{"Item":"5L Pinta Negra","Category":"WINES","Caption":"5L","ItemImageURL":"images/16.jpg","Price":"32,000","Veg":"","Available":"Yes"},
];
var iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);
//$("#wohref").prop('disabled', true);
var waddr = "";
var cartM = "";
var cartV = 0;
var minV = 2000 || 0;
var catArray = [];
var payMode = 'USSD - Rwanda';
var payNote = '*182*1*1*0782368983#';
var lang = 'en';
var perC = "0%";
perC = cleanP(perC);

function cleanP(perC2){
if (perC2.indexOf("%") > -1) {
  perC2.replace("%","").replace(" ", "");
    return 1+(parseInt(perC2)/100);
} else {return 1;}
}

var amtPayable = 0;
var delC = 500;

var blurred = false;
window.onblur = function() { blurred = true; }

function ifAt(){
    if(cartArray.length<1){
        location.reload(true);
        console.log('refreshed');
    }
}

function checkPageFocus() {
if (document.hasFocus()) {
var now = new Date().getTime();
try {
    var last = localStorage.getItem('wolastupdate');
} catch (e) {
    window.onfocus = function() { blurred && (ifAt()); }
}
//alert(last);
if (last == null){
    localStorage.setItem('wolastupdate', now);
    last = now;
}
if (last) {
  var diff = now - last;
  var mins = Math.floor(diff / 60000);
  console.log(mins);
  if (mins > 60){
    //alert('Page refresh required. '+mins+ ' mins old page.');
    $("#worefresh").text('... ...');
    $("#worefresh").show();
    location.reload(true);
    localStorage.setItem('wolastupdate', now);
  }else{
    //alert('save');  
    localStorage.setItem('wolastupdate', now);
  }
}
} // document has focus
} setInterval(checkPageFocus, 1000);

function toTitle(str) {
    return str.replace(/(?:^|\s)\w/g, function(match) {
        return match.toUpperCase();
    });
}

function urlencode(str) {
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

function showStext(){
    $("input#wosearch").val('');
    $("li.woitemimage").show();
    $("#catList").toggle();
    $("#wosearchdiv").toggle();
    $("#items .title").toggle();
    $("input#wosearch").focus();
}

function checkIt(){
    //alert(cartV);
    if('no' == 'no'){
        //shop closed
        notifyC("Please note the shop may be closed", "info");
    }
    if(cartV < minV && (!document.getElementById('wopic').checked)){
        // minimum order value
        notifyC("Minimum order value is "+minV, "warning");
        return false;   
    }
    if((waddr.trim() !== "")&&(cartArray.length>0)){
        $("#wohref").addClass("is-loading");
        $("#worefresh").show();
        return true;
    } else {
        if(cartArray.length<1){
            //check cart
        notifyC("Please check cart", "warning");
        return false;
        } else if (waddr.trim() === ""){
            //check address
        notifyC("Please complete your details", "warning");
        return false;            
        }
    }
}

$(document).ready(function(){
    try {
    if (localStorage.woaddress1) {
        waddr = JSON.parse(localStorage.woaddress1);
        document.getElementById('woaddress').value = waddr.addr1;
        document.getElementById('wodeliveryTime').value = waddr.Time;
        updateWOaddress();
        //waddr = buildAddr(waddr);
    }
    } catch (error) {
        console.error(error);
  
    }
    
    $.each(view, function (index) {
    var categ = view[index].Category;
    if ($.inArray(categ, catArray) == -1) {
        catArray.push(categ);
    }
    });
    var $catTab = $("#catList");
    $.each(catArray, function (i) {
    $catTab.append('<li><a style="color: #9c487a;" href="#' + catArray[i].replace(/\s+/g,"-") + '">' + catArray[i] + '</a></li>');
    });
    
    var gview = view.reduce(function(result, current) {
    result[current.Category] = result[current.Category] || [];
    result[current.Category].push(current);
    return result;
    }, {});
    //console.log(JSON.stringify(gview));
    //alert(gview.Breakfast[0].Item);
    
    var gmenu = "";
    var suf = "";
  $.each(gview, function(gindex) {
      gmenu += '<h3 style="margin-top:20px;" class="title is-5" id='+ gindex.replace(/\s+/g,"-") +'>' + gindex + '</h3>';
      $.each(gview[gindex], function(ggindex) {
        //console.log(this.Item);
        if((this.Available).trim().toLowerCase()=="yes"){
            var veg = (this.Veg).trim().toLowerCase();
            if(veg==="yes"){
            //suf="<img src='https://img.icons8.com/color/16/000000/vegetarian-food-symbol.png'>";
            suf='<span style="font-size:1.1em;color:#439547;">&#9679</span>';
            } else if(veg==="no"){
            //suf="<img src='https://img.icons8.com/color/16/000000/non-vegetarian-food-symbol.png'>";
            suf='<span style="font-size:1.1em;color:#BF360C;">&#9679</span>';
            } else {
            suf = "";
            }
        gmenu += '<li class="box is-marginless woitemimage" style="background-image: url('+this.ItemImageURL+'); margin-top:5px !important;" data-item='+toTitle(this.Item)+' data-price='+this.Price+'><a onClick="javascript:updateC(\''+toTitle(this.Item)+'\', 1, '+this.Price.replace(/,/g, "")+');" style="padding-top:0px;" class="mitem is-success is-pulled-right"><i style="color:var(--wotheme);" class="far fa-2x fa-plus-square"></i></a><span class="is-pulled-right" style="padding-right:15px;padding-top:4px;"><span class="is-size-7 has-text-black-light">RWF</span> '+this.Price+'  </span><div style="padding-left:2px;"><b>'+suf+''+toTitle(this.Item)+'</b><br/><small>'+this.Caption+'</small></div></li>';
        }
      });
  });
    //console.log(gmenu);
    document.getElementById("items").innerHTML = gmenu;
    $("#wohref").removeClass("is-loading");

$("#worefresh").hide();
$("#worefresh").click(function(){
  $("#worefresh").hide();
  location.reload(true);
}); // toggle click to refresh

 jQuery.expr[':'].icontains = function(a, i, m) {
  return jQuery(a).text().toUpperCase()
      .indexOf(m[3].toUpperCase()) >= 0;
 };

$("input#wosearch").keyup(function(){
  $("li.woitemimage").show();
  if((this.value).trim() !== ""){
  $("li.woitemimage:not(:icontains("+this.value+"))").hide();
  if($('#items li:visible').length == 0){
    notifyC("0 items", "warning");
  }
  }
}); 

    $('.woitemimage a').click(function(event){
       event.stopPropagation();
    });

     $(".woitemimage").click(function() {
     var bg = $(this).css('background-image');
     bg = bg.replace('url(','').replace(')','').replace(/\"/gi, "");
     //alert(bg);
     //if(/(jpg|gif|jpeg|png|google)$/.test(bg)){
     if(!bg.includes("whatsorder.com")){     
        $("html").addClass("is-clipped");
        $("#modal").addClass("is-active");
        $("#modalcontent").html('<center><img src = "'+bg+'" alt="Image"></center>');
     }
     });
     
     $(".modal-close").click(function() {
     $("html").removeClass("is-clipped");
     $(this).parent().removeClass("is-active");
     });
     
     $(".modal-background").click(function() {
     $("html").removeClass("is-clipped");
     $(this).parent().removeClass("is-active");
     });

}); // end of document ready
    
</script>

<script>
document.addEventListener("contextmenu", function(e){
  e.preventDefault();
}, false);
</script>
<script>
document.addEventListener("keydown", function(e){
  if (e.ctrlKey || e.keyCode==123) {
    e.stopPropagation();
    e.preventDefault();
  }
});
</script>
<style>
:root { --wotheme:#9c487a; /*#23D160;*/ }

.woitemimage { background-repeat: no-repeat;background-position:5px; background-size:48px auto;padding-left:58px; }
#worefresh{min-width:150px;margin-left:-75px;position:fixed;z-index:1;left:50%;bottom:70px;}
input[type=radio]{padding-right: 5px;}.rlabel{color:#9c487a;display:inline-block;cursor:pointer;font-weight:700;padding:5px 15px}
.wohide {
   position: absolute !important;
   top: -9999px !important;
   left: -9999px !important;
}
html{
  scroll-behavior: smooth;
}
.title {
  font-size: 25px;
}
.subtitle{
  font-size: 18px;
}
.media-left img{
  border-radius: 10px;
}
.button{
    background-color: #9c487a;
    color: #fff;
}

  @media only screen and (max-width: 700px) {
  .title {
      font-size: 19px;
  }
  .media-left{
      width: 125px;
  }
  }
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168030659-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-168030659-1');
</script>

</head>
<body style="background-color:#f6f6f6;">
<div id="footsum" class="card" style="min-width:100%; z-index:15; padding:10px 30px; position:fixed; bottom:0px;display:none;">
  <div id="wofootsum" class="is-pulled-left" style="margin-top: calc(.300em - 1px);"><!--span class="tag is-rounded is-light is-size-6">4</span> ¡¤ <small>FRW 1245</small--></div><div class="is-pulled-right"><a href="#woorderbox" class="button"><i class="has-text-white fas fa-shopping-cart"></i></a></div>
</div>    
<section class="section has-background-white"><div class="container"><div class="media">

<div class="media-left"><img src="images/logo.png" width="170"></div>
<div class="media-content">

<h1 class='title has-text-black'>RWANGABWOBA </h1>
<h2 class='subtitle has-text-black' style="margin-top: 5px;">WINES & lIQUOR SHOP <br>Kigali-Rwanda <br>Phone: 0782368983 </h2>
</div>
</div></div>
</section>
<section class="section" style="padding-top:20px;">
<div class="container">
<div class="columns">
<div class="column is-two-thirds">
    
<div class="tabs has-background-white" style="z-index:10;position:-webkit-sticky;position:sticky;top:0;border-top:#000 solid 1px;">
 
 <div id="wosearchdiv" class="tabs" style="display:none; margin-bottom:0rem; width:100%;"><input name="wosearch" id="wosearch" type="text" style="width:100%;border:0;padding-left: calc(.625em - 1px);" placeholder="Type search text here..."><a onclick="showStext();">X</a></div>    

  <ul id="catList">
    <li style="z-index:100;position:-webkit-sticky;position:sticky;left:0;"><a style="border-style:none;" onclick="showStext();"><i class="fa fa-search"></i></a></li>
    <!-- li class="is-active"><a>All</a></li -->
  </ul>
</div>

<div id="items">Loading ...</div>

</div><div class="column">
<div id="addr" class="box has-background-white">
    

<div class="radio-group">
<input type="hidden" id="wodel" name="selector" checked onclick="ispickup();" onchange="updateWOaddress();"><input type="hidden" id="wopic" name="selector" onclick="ispickup();" onchange="updateWOaddress();">
</div>

  <label class="label is-marginless" style="float: left;">Customer's Details</label>
<div> 
    <div class="field">      
      <textarea rows="4" class="input woaddr" type="text" id="woaddress" placeholder="Names & Address for Delivery" onchange="updateWOaddress();" required></textarea>
  </div>
  
    <div class="field">      
  <label class="label is-marginless" style="float: left;">Time</label>
    <input class="input woaddr"type="text" value="<?php echo date('Y-m-d').' '.date('H:i'); ?>" id="wodeliveryTime" onchange="updateWOaddress();">
  </div>
</div>
</div>


<div id="woorderbox" class="box has-background-white">
<h2 class="subtitle">Your Order</h2>
    <div class="tile is-parent is-vertical" style="padding:0rem;" id="wocart">
        <p class='has-text-centered'>Your cart is empty</p>
    </div> <!-- end of cart div -->

<div><hr><a id="wohref" target="_blank" onClick="return checkIt();" class="button is-medium is-fullwidth">Order Now<img src="./logo.jpeg" class="img-circle" width="40" height="40" style="margin-left:7px;border-radius:10px;border-color: black;"> </a>
</div>

</div>

</div>
</div>
</div>

</section>

<script>
function ispickup(){
  let x = document.getElementById('wopic').checked;
  document.getElementById('woaddress').disabled = x;
  updateC();
}
function buildAddr(waddr){
   return waddr.addr1+'%0A'+waddr.Time;
}

function updateWOaddress(){
waddr = '';
var errC = 0;
var inputs = document.getElementsByClassName('woaddr');
for (var i = 0; i < inputs.length-1; i += 1) {
    if(!inputs[i].disabled){
      if(!inputs[i].value.trim()){
         errC += 1;
        }
    }
}
if (errC > 0) {
  return;
}
waddr = {
"addr1" : inputs[0].value,
"Time" : inputs[1].value
};
try {
localStorage.woaddress1 = JSON.stringify(waddr);
} catch (error) {
    console.log(error);    
}
waddr = buildAddr(waddr);
updateC();

} 
function notifyC(themsg,ntype){
    $("#notification").finish();
    $("#notification").html(themsg);
    $("#notification").removeClass();
    $("#notification").addClass("notification");
    $("#notification").addClass("is-"+ntype);
    $("#notification").fadeIn().delay(800).fadeOut("slow");
}

var cartArray = [];

function deleteRow(arr, row) {
   arr = arr.slice(0); // make copy
   arr.splice(row, 1);
   return arr;
}

function updateC(itm,qty,rte){

var newA =[itm,qty,rte];
const arrayColumn = (arr, n) => arr.map(x => x[n]);
cartV = 0;
cartM = "";
var exists = false;

if (itm !== undefined) {
// start of cartArray modify
$.each(cartArray, function (i) {    
 if(cartArray[i][0].toLowerCase() == newA[0].toLowerCase()){
  cartArray[i][1] += newA[1];
  exists = true;
    if(cartArray[i][1]<1){
      cartArray = deleteRow(cartArray, i);
      return false;
    }
 }
});

if (!exists) {
  cartArray.push(newA);
}
// end of cartArray modify
}
document.getElementById('wocart').innerHTML = "";

$.each(cartArray, function (i) {
if(cartArray[i][1]>0){
document.getElementById('wocart').innerHTML += '<div class="panel-tabs is-fullhd is-size-6" style="align-items: flex-start;"> <a class="is-pulled-left" style="border:0; color: #9c487a; onClick="updateC(\''+ cartArray[i][0] + '\',-1,'+ cartArray[i][1] + ');"><i class="far fa-2x fa-minus-square"></i></a><span style="width:200px;padding:8px 2px;">' + '<b class="tag is-medium is-light is-rounded">'+ cartArray[i][1] + '</b> x '+ cartArray[i][0] + '</span> <a class="is-pulled-right" style="border:0;color: #9c487a;" onClick="updateC(\''+ cartArray[i][0] + '\',1,'+ cartArray[i][1] + ');"><i class="far fa-2x fa-plus-square"></i></a> </div><!--hr style="margin: 1rem 0;"/-->';
    cartV += (cartArray[i][1] * cartArray[i][2]);
    cartM += cartArray[i][1] + " x " + cartArray[i][0] +  "\r\n";
}
});

var cntItems = arrayColumn(cartArray, 1).reduce((a, b) => a + b, 0);

if(cntItems > 0){
var delC = 500;
delC = parseFloat(delC);
delC = (document.getElementById('wopic').checked ? 0 : delC);
amtPayable = ((cartV+delC)*perC).toFixed(2);

$('#footsum').show();
document.getElementById('wofootsum').innerHTML = '<span class="tag is-rounded is-light is-size-6 has-text-weight-bold">'+cntItems+'</span> <small class="is-size-7 has-text-black">RWF '+amtPayable+'</small>';

//cart total footer below
document.getElementById('wocart').innerHTML += "<div class='is-fullhd'><hr style='margin:1rem 0;color:#fff;'/><span class='has-text-weight-semibold is-pulled-left'>Payable</span><span class='has-text-weight-semibold is-pulled-right'>RWF "+cartV.toFixed(2)+"</span><br/><span class='has-text-weight-normal is-pulled-left'>Delivery</span><span class='has-text-weight-normal is-pulled-right'>"+((delC == 0) ? '0.00':'RWF '+delC.toFixed(2))+"</span><br/><span class='has-text-weight-bold is-pulled-left'>Total <small class='has-text-weight-light'></small></span><span class='has-text-weight-bold is-pulled-right'>RWF "+amtPayable+"</span></div><br/><span class='has-text-black is-size-7'>Your order is ready to be sent via WhatsApp.</span>";
} else {
    // your cart is empty
document.getElementById('wocart').innerHTML += '<p class="has-text-centered">Your cart is empty</p>';
$('#footsum').hide();
}

    //waddr = urlencode(toTitle(waddr));
    //console.log(waddr);

upLink();

// console.log(cartArray);
// update cart
notifyC("Cart updated", "info");

} // end of updateC

function thePaynote(pMode,pNote,pValue){
    var pCur = 'RWF';
    var payN = 'Cash on delivery';
    
    switch(pMode) {
        case 'Show Note':
            payN = pNote;
            break;
        case 'USSD - Rwanda':
            var ussdrw = 'amt='+pValue+'&ussdid='+pNote;
        case 'Payment link':
            payN ='Pay on Our MoMo Account: ' + escape(encodeURI(pNote));
            break;
        case 'Append Amount to Link':
            payN = 'give us a screenshot of your payment.%0A'+ escape(encodeURI(pNote));
            break;            
            
    } // end of payment mode switch
    
    return payN;
}

function upLink(){
var jstand = true;
if(!jstand){
    cartM = 'Trial version\nItem ABC x 2\nItem XYZ x 3';
}
var wlink = "https://api.whatsapp.com/send?phone=250788723334&text=Thanks for ordering at "+" (RWANGABWOBA WINES and lIQUOR)%0A%0A" + urlencode(cartM) + "%0APayable: RWF " + amtPayable + "%0A";
wlink += "%0ACustomer's Details%0A";
wlink += toTitle(waddr).replace(/\x26/,"%26").replace(/\x23/,"%23");
if (wlink !== "") {
    wlink += "%0A%0AYou Can "+thePaynote(payMode,payNote);;
    wlink += "%0A%0AYour Order Will be reach to you shortly!%0A%0A";
}

document.getElementById("wohref").setAttribute('href', wlink);
    
} // end of upLink

</script>

<div id="notification" class="notification" style="display:none;position:fixed;top:0px;width:100%;z-index:105;"></div>

<center><div id="worefresh" class="is-info tag is-size-6">
<a class="has-text-white" href="">Click to refresh</a>
</div></center>

<footer class="footer">
   <div class="content has-text-blue has-text-centered">
 <p class="copyright">copyright &copy; 2022 <a style="color: #9c487a;" target="_blank" href="http://www.mshop.rw">Rwangabwoba Wines & Liquor</a></p>
  </div>
</footer>

<!-- modal starts -->
<div id="modal" class = "modal" style="z-index:50;">
   <div class = "modal-background"></div>
   <div class = "modal-content">
      <div class = "box">
            <div class = "media-content">
               <div id="modalcontent" class = "content">
                 
               </div>
            </div>
      </div>
   </div>
   <button class = "modal-close is-large" aria-label="close"></button>
</div>
<!-- modal ends -->

<script type="text/javascript">

$("#wodeliveryTime").datetimepicker({
    format: 'yyyy-mm-dd hh:ii',
    autoclose: true,
    todayBtn: true
});
</script>

</body>
</html>
