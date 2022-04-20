<!DOCTYPE html>
<html lang="en">

<head>
 <title><?php include('header_title.php'); echo $header_tit; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="landing page, website design" />


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>



<style>


/* navigation */


.left-column-all {
    overflow-x: hidden;
    position: fixed;
    z-index: 9999;
    width:50vw;
    height: 100vh;
    background: url(home1.png) center no-repeat fuchsia;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -ms-background-size: cover;
    -o-background-size: cover;

/*
    margin-top: 0px;
    margin-left: 0px;
    */
}



@media screen and (max-width: 1440px) {
.left-column-all {
width:100vw;
width:100vh;

}

}
	
.right-column-all {
 margin-left:40vw;
/*
margin-left:47vw;
*/
}

@media screen and (max-width: 800px) {
.left-column-all {
    width: 100vw;
    position: inherit;
    background-position: inherit;
}

.right-column-all {
    margin-top: 0px;
margin-left: 0px;

}
}




/*ensure that category button does not jam about us or event section when on mobile start here. you can remove it if you
like. this will make product contain maximum of 8 categories button*/
@media screen and (max-width: 768px) {
.left-column-all {
   padding-bottom:700px;
}
}

@media screen and (max-width: 600px) {
.left-column-all {
   padding-bottom:700px;

}
}

/*ensure that category button does not jam about us or product section when on mobile ends here.*/




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

background: fuchsia;
color:white;
}

.dropdown_dashedline{
 border-bottom: 2px dotted white;
}

.navgate101:hover{
background:fuchsia;
color:white;

}





/* home starts */
  
.home_image {	
width:100%;
/*
height:500px;
max-height:500px;
*/
height:100vh;
max-height:100vh;
       
        
}

.home_content_head {
        color: white;
        font-size:40px;
        font-weight:bold;
	font-family:comic sans ms; 
width:40vw;
margin-left:-110px;
  
}

.home_content_text {
        color: white;
        font-size:20px;
        font-weight:bold;
	box-sizing: border-box;
      //position: relative;
        
}

.home{
background:#ec5574;
}

.home:hover{
box-shadow: inset 0 0 0 25px fuchsia;

}


.home_text_transparent_home {
border-style: solid; border-width:1px; border-color: orange;
  width: 100%;
  padding: 90px;
  position: absolute;
  bottom: 0px;
  background: rgba( 0, 0, 0, 0.50);

  color: white;
  height:100%;
text-align: center;

}



@media screen and (max-width: 768px) {
  .home_text_transparent_home{

  width: 100%;
  padding: 20px;
  }
}



@media screen and (max-width: 600px) {
  .home_content_home{
  width: 100%;
  padding: 20px  
  }
}













.marquee_button{
background-color: fuchsia;
padding: 6px;
color:white;
font-size:14px;
//border-radius: 50%;
transform: skew(15deg);
border: none;
cursor: pointer;
text-align: center;



}
.marquee_button:hover {
background: black;
color:white;
}


.marquee_image{ 
width:60px;height:60px;
border-radius: 50%;
border-style: solid; border-width:2px; border-color: fuchsia;
}






/* footer */


  .navbar_footer {
letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
    //background-color:fuchsia;
    color:white;
    padding:20px;
    border: 0;
    font-family: comic sans ms;
  }


.footer_bgcolor{
background: black;
}

.footer_text1{
color:white;
font-size:20px;
border:none;
cursor:pointer;
}

.footer_text2{
color:grey;
font-size:14px;
border:none;
cursor:pointer;
}

.footer_text1:hover{
color:grey;
}


.footer_text2:hover{
color:orange;
}


.footer_dashedline{
 border-top: 1px dashed white;
}


.contact_info{

background: fuchsia;
color:white;
cursor: pointer;
padding:16px;
border-radius: 10%;

}
.contact_info:hover{
background: orange;
color:black;

}


.contact_info_dashedline{
  border-bottom: 5px dashed fuchsia;

}


.left_shifting{

width:40%;
}

@media screen and (max-width: 768px) {
.left-column-all {
width:100%;

}

.home_resize_padding {
padding-top:100px;
}


}



@media screen and (max-width: 600px) {
.left-column-all {
width:100%;

}

.home_resize_padding {
padding-top:100px;
}

}

.modaling_sizing{
width:59%;
}


@media screen and (max-width: 768px) {
.modaling_sizing {
width:99%;

}

.home_content_head {       
margin-left:0px; 
padding-top:10px;
width:100%;
text-align:center;
}


}

@media screen and (max-width: 600px) {
.modaling_sizing {
width:99%;
}

.home_content_head {       
margin-left:0px; 
padding-top:10px;
width:100%;
text-align:center; 
}



}

.category_post{
background-color: fuchsia;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}
.category_post:hover {
background: black;
color:white;
}	





</style>



 
</head>
<body>






















<!--start left column all-->

    <div class="left-column-all left_shifting">

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

        <li class="navgate about_click">Home/About</li>
        <li class="navgate services_click">How It Works</li>
       



      </ul>


    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->






<div class="home_text_transparent_home" >
<div class="home_resize_padding"> 


<p class="home_content_head pull-left"><?php include('header_title.php'); echo $header_tit; ?></p>
<marquee> <p class=""><button class="contact_click marquee_button"><img class="marquee_image" src="home1.png" /><?php include('header_title.php'); echo $header_tit; ?></button> </p></marquee>

                        <p class="home_content_text">Accessibility</p>


<style>


.dropdown_color:hover{
background: black;
color:white;

}
</style>



<p>

<a  class="category_post" href="signup.php">Signup</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a  class="category_post" href="login.php">Login</a>

</p>


<br> 
     
</div> 
</div>


    </div>
<!--end left column all-->












<!--start right column all-->
    <div class="right-column-all">




















<!-- about Section start-->
<div  class="about section_padding aboutus_bgcolor" style=''>


  <h2 class="text-center"><span class="contact_name_color">About <?php include('header_title.php'); echo $header_tit; ?></span></h2>
  <p class="footer_text2"><?php echo $heading; ?> </p>
<img style="width:100%;min-width:100%;max-width:100%;height:400px;" src="home2.png">

<style>
.hh{
color:#800000;
}

.hh:hover{
color:black;
}
</style>
  <h2 class="text-center"><span class="contact_name_color hh">Powered by <?php echo $poweredby; ?>.</span></h2>


</div>




<!-- about Section ends-->





<!--services Section start-->
<div  class="services section_padding aboutus_bgcolor">


  <h2 class="text-center"><span class="contact_name_color">How to Offer & Request for Help in STEM Fields</span></h2>
<b style='font-size:18px;color:#800000'>Step 1: Signup, Login, Connect & Recieve a Score Points</b><br> Signup, Login and get Connected with other 
<b>STEM Women, good People and various
Communities </b>. Once signed up, you will be awarded a Score Points of <b>100</b> for your Initial Help and Contributions<br><br>


<b style='font-size:18px;color:#800000'>Step 2: Add and Post Contents to the Application</b><br>

You can create a New Posts, Uploads a Photos or Share a Youtube Video contents indicating areas that you wants to
<b style='font-size:14px;color:#800000'>Offer for Help or Request for Help in STEM fields</b>
 Eg. <b>( ICT, IT, Job Opportunities, Sciences, Technology, Mathematics, Engineering)</b>. 


For instance, to create a New Post, you will enter your <b>Posts Title, Descriptions, Names,Locations/Full Address etc</b> to get you and your Posts appears
 on the <b style='font-size:14px;color:#800000'>application</b> and on the
<b style='font-size:14px;color:#800000'>Google Map</b> for all STEM community Members to view and connect to You. <br>
You can Interact with Users/Community on your Posts or in their various Posts in the  <b style='font-size:14px;color:#800000'>Comments sections or
 via Private Email Messages</b> that other Community
Members will send to You.<br><br> You can also see where the Users/Posters are on <b style='font-size:14px;color:#800000'>Google Map</b>,
 who they are and can also view their respective Profiles.

<br>



<b style='font-size:18px;color:#800000'>Step 3: Realtime Notifications</b><br> Get notified each time a <b style='font-size:14px;color:#800000'>
New Posts, Photos and Youtube Video Updates is created in STEM Fields</b>
 and each time someone <b style='font-size:14px;color:#800000'>commented</b>
on your posts respectively.<br><br>

<b style='font-size:18px;color:#800000'>Step 4: Earn More Awards/Score Points by Your Contributions</b><br> 
The applications awards more points to those who help STEM Women via the Posts Updates contributions the most. Eg
Each time you create a new Post, the application will award you a <b style='font-size:14px;color:#800000'>Score points of (50)</b> and a 
<b style='font-size:14px;color:#800000'>Score Points of (10)</b>
each time you commented postively on the Posts/Item being added.<br><br>

<b style='font-size:18px;color:#800000'>Step 5: Happy Help Offering & Requesting</b><br> Always be happy that you have help someone
through your Posts, Photos, Videos and Comments Sharing contributions. Be glad  that you
have also made some STEM Women and  other community Members happy..<br><br>





</div>

<!-- services Section ends-->







<!-- footer Section start -->

<footer class=" navbar_footer text-center footer_bgcolor">

<div class="row">

        <div class="col-sm-12">

<p class="footer_text1"><?php echo $header_tit; ?></p>
<p class="footer_text2"><?php include('footer_title.php'); echo $footer_tit1; ?></p>
<br>

<p><?php echo $footer_tit2; ?><a class="btn_copyright" href="<?php echo $footer_tit3; ?>"><?php echo $footer_tit3; ?></a></p>


        </div>

 
</div>



</div>

<div class="footer_text1">
<p class="footer_text1"></p>
</div>


<div class="footer_dashedline"></div>

 </footer>

<!-- footer Section ends -->
	




<div>
  <!--end right column all-->    







<script>

        $(document).ready(function (){
           
           $(".home_click").click(function (e){
              //prevent page reload
              e.preventDefault();
              $('html, body').animate({
              scrollTop: $(".home").offset().top
                }, 1200);
            $('.collapse').collapse('hide');
            });

           

 $(".about_click").click(function (e){
              //prevent page reload
              e.preventDefault();
              $('html, body').animate({
              scrollTop: $(".about").offset().top
                }, 1200);
            $('.collapse').collapse('hide');
            });


            $(".services_click").click(function (e){
             //prevent page reload
             e.preventDefault();
             $('html, body').animate({
             scrollTop: $(".services").offset().top
                }, 1200);
            $('.collapse').collapse('hide');
            });

           

           


        });
 

//show modal cv on page load

 $(window).on('load',function(){
        $('#myModal_newsletter').modal('show');
    });



</script>

   
</body>
</html>



















