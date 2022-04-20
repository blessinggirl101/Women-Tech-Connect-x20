
<?php
session_start();
include ('authenticate.php');


$userid_sess =  htmlentities(htmlentities($_SESSION['uid1'], ENT_QUOTES, "UTF-8"));
$fullname_sess =  htmlentities(htmlentities($_SESSION['fullname1'], ENT_QUOTES, "UTF-8"));
$username_sess =   htmlentities(htmlentities($_SESSION['username1'], ENT_QUOTES, "UTF-8"));
$photo_sess =  htmlentities(htmlentities($_SESSION['photo1'], ENT_QUOTES, "UTF-8"));
$email_sess =  htmlentities(htmlentities($_SESSION['email1'], ENT_QUOTES, "UTF-8"));

?>





<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title></title>
    <style>
    
      #map {
        height: 80%;
      }
    
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>



  <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>


<script src="moment.js"></script>
	<script src="livestamp.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
/*
//check if session is set and prevent Direct Access to the App.

var userid_sess_data1 = localStorage.getItem('useridsessdata');

if (userid_sess_data1 == null || userid_sess_data1 == undefined) {

  alert('You Must Login To Access this Page');
window.location='login.html';
//return false;
}

*/
</script>



<script>
$(document).ready(function(){
var userid_sess_data = '<?php echo $userid_sess; ?>';
var fullname_sess_data = '<?php echo $fullname_sess; ?>';
var username_sess_data = '<?php echo $username_sess; ?>';
var email_sess_data = '<?php echo $email_sess; ?>';
var photo_sess_data = '<?php echo $photo_sess; ?>';

var levels_sess_data = ''



var rec = "<span>" +
"<img src='uploads/" + photo_sess_data +"'  style='text-align:left;border-radius:50%;width:60px;max-width:60px;height:60px;max-height:60px;border-style: solid; border-width:3px; border-color: #ec5574;'>" +
 "</span>";

$('.myd_photo_sess').html(rec);
$('.myd_fullname_sess').html(fullname_sess_data);
$('.myd_userid_sess').html(userid_sess_data);
$('.myd_username_sess').html(username_sess_data);





});

</script>


<style>






<style>



.section_padding {
padding: 60px 40px;
}

.imagelogo_li_remove {
list-style-type: none;
margin: 0;
 padding: 0;
}

.imagelogo_data{
 width:120px;
 height:80px;
}



  .navbar {
    letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
   background-color:fuchsia;

    z-index: 9999;
    border: 0;
    font-family: comic sans ms;
//color:white;
  }



  
.navbar-toggle {
background-color:orange;
  }

.navgate {
padding:16px;color:white;

}

.navgate:hover{
 color: black;
 background-color: orange;

}


.navbar-header{
height:60px;
}

.navbar-header-collapse-color {
background:white;
}

.dropdown_bgcolor{

background: #ec5574;
color:white;
}

.dropdown_dashedline{
 border-bottom: 2px dotted white;
}

.navgate101:hover{
background:purple;
color:white;

}



.res_center_css{
position:absolute;top:50%;left:50%;margin-top: -50px;margin-left -50px;width:100px;height:100px;
}



.category_post1{
background-color: fuchsia;
padding: 6px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
z-index: -999;
}
.category_post1:hover {
background: black;
color:white;
}


/* make modal appear at center of the page */
.modal-appear-center {
margin-top: 25%;
//width:40%;
}


/* make modal appear at center of the page */
.modal-appear-center1 {
margin-top: 15%;
//width:40%;
}


.modal_head_color{
background-color: fuchsia;
padding: 6px;
color:white;
}


.modal_footer_color{
background-color: fuchsia;
padding: 6px;
color:white;
}



.cal_btn{
background-color: fuchsia;
padding: 10px;
color:white;
font-size:14px;
border: none;
cursor: pointer;
text-align: center;
}
.cal_btn:hover {
background: black;
color:white;
}



.cal_css{
background-color: green;
padding: 10px;
color:white;
font-size:14px;
border: none;
cursor: pointer;
text-align: center;
}
.cal_css:hover {
background: black;
color:white;
}



.com_btn{
background-color: purple;
padding: 10px;
color:white;
font-size:14px;
//border-radius: 50%;
border: none;
cursor: pointer;
text-align: center;
}
.com_btn:hover {
background: black;
color:white;
}

	
</style>

<html>
  <body>

<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img class="img-rounded imagelogo_data" src="logo.png"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">


      <ul class="nav navbar-nav navbar-right">


 <li class="navgate_no"><a title='View Dashboard' href="dashboard.php" style="color:white;font-size:14px;">
<button class="category_post1">Dashboard</button></a></li>
        

             <li class="navgate"> <span class='myd_photo_sess'></span>
<span class='myd_fullname_sess'></span></li>


        <li class="navgate"><a  href="logout.php" style="color:white;font-size:14px;">logout</a></li>
      </ul>




    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->





      <h3>Users Maps Locations</h3>
<?php
include('settings.php');
?>

<!-- start map loading-->
<style>
#map {
        height: 80%;
      }
    
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
.res_center_css{
position:absolute;top:50%;left:50%;margin-top: -50px;margin-left -50px;width:100px;height:100px;
}

</style>

<div id="loader" class='res_center_css'></div>

    <div  id="map"></div>

    <script>




      var customLabel = {

        Vaccine: {
          label: 'P'
        }
       

      };
//center: new google.maps.LatLng(-33.863276, 151.207977),
//zoom: 12
 
/*
 var url_content1 = window.location.href;
var url_p1 = new URL(url_content1);
var identity = url_p1.searchParams.get("identity");
*/



        function initMap() {
//function {
//$('.btn_action_map').click(function(){
//$(document).on( 'click', '.btn_action_map', function(){ 


//var postid = $(this).data('id');
//var title = $(this).data('title');
//var identity = $(this).data('identity');
//var lngx = '30.5236';
//var latx = '50.4500';

var lngx = '-75.000000';
var latx = '43.000000';



//center: new google.maps.LatLng(32.944012, -85.953850),

        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(latx, lngx),
          zoom: 4
        });
        var infoWindow = new google.maps.InfoWindow;

$('#loader').fadeIn(400).html('<br><div style="color:black;background:#c1c1c1;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i>  &nbsp;Please Wait, Google Map is being Loaded...</div>');

          downloadUrl('map_public_backend.php', function(data) {
			 // downloadUrl('map_public_backend.php?identity='+identity, function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
 var photo = markerElem.getAttribute('photo');
var timing = markerElem.getAttribute('timing');
var title = markerElem.getAttribute('title');
var title_seo = markerElem.getAttribute('title_seo');
var desc = markerElem.getAttribute('content');
var data_type = markerElem.getAttribute('data_type');
var fullname = markerElem.getAttribute('fullname');
var userid = markerElem.getAttribute('userid');
var images = markerElem.getAttribute('images');
var comments = markerElem.getAttribute('comments');	
var ps = markerElem.getAttribute('help_category');
              var type = markerElem.getAttribute('type');
var post_photo = markerElem.getAttribute('p_photo');
var post_video = markerElem.getAttribute('p_video');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

$('#loader').hide();

              var infowincontent = document.createElement('div');
             var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};


var pic ='public.png';
var private ='private.png';


var pr = markerElem.getAttribute('post_status');
if(pr =='Seeking Help'){
var pp ='Seeking Help on ';
}

else{
var pp ='Requesting to Help Out on';
}


if(data_type=='photo'){

var rec = "<span>" +
"<img src='uploads/" + post_photo +"'  style='width:200px;max-width:200px;max-height:200px;height:200px;' class='pull-right img-rounded'>" +
 "</span>";
//$('.myimages').html(rec);

}

if(data_type=='video'){
var rec = "<span>" +
"<iframe class='responsive_video' style='width:300px;max-width:300px;max-height:300px;height:300px;' src='https://www.youtube.com/embed/" + post_video +"'></iframe>" +
 "</span>";
}

if(data_type=='post'){

var rec = "<span>" +
"<img src='uploads/" + images +"'  style='width:200px;max-width:200px;max-height:200px;height:200px;' class='pull-right img-rounded'>" +
 "</span>";

}

//if(data_type=='public'){
                var map_data = "<div style='background:#c1c1c1; border-bottom: 2px dashed purple;'>" +
"<div style='background:#824c4e;color:white;padding:10px;'>Users Map Location Center</div><br />" +
"<img src='uploads/" + photo +"' style='width:50px;max-width:50px;max-height:50px;height:50px;border-radius:50%'><br>" +
//"<img src='uploads/" + images +"' style='width:200px;max-width:200px;max-height:200px;height:200px;' class='pull-right img-rounded'><br>" +

"<div > " + rec +"</div><br>" +
//"<img src=" + photo +" style='width:50px;max-width:50px;max-height:50px;height:50px;border-radius:50%'><br>" +
"<span><b>Name:</b> " + fullname + "</span><br />" +
"<span><b>Title:</b> " + title + "</span><br />" +
"<span><b>Description:</b> " + desc + "</span><br />" +

"<span><b>Users Location Address: </b>" + address + "</span><br />" +
"<span style='color:green;font-size:16px;'><b>" + pp + ":</b> " + ps + "</span><br />" +
  "<span><b> <span class='fa fa-calendar'></span>Time:</b></span>" +
"<span data-livestamp='" + timing + "'></span></span><br /><br />"+

"<a title='Comments' href='reply.php?title=" + title_seo +"&post_id=" + id +"' style='background:#824c4e;color:white;padding:10px;border-radius:10%'>(" + comments + ")<i  style='color:white;font-size:30px;' class='fa fa-comments-o'></i> Comments</a><br>" +

                    "</div>";
//}



              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label,
 title : 'welcome'
              });
              marker.addListener('click', function() {
                //infoWindow.setContent(infowincontent);

//infoWindow.setContent('<b>'+name + "</b><br>" + address);

infoWindow.setContent(map_data);
                infoWindow.open(map, marker);
              });
            });
          });
		  
		   //});  // close jquery clickbutton
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}

/*
 $('#myModal_map').on('shown.bs.modal', function(){
    //init();
initMap();

    });
*/


    </script>
  
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_map_keys; ?>&callback=initMap">
    </script>
  </body>
</html>





























