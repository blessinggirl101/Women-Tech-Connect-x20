<?php

//error_reporting(0);
session_start();
include ('authenticate.php');

$uid = strip_tags($_SESSION['uid1']);
$userid = $uid;
$fullname = strip_tags($_SESSION['fullname1']);
$username =  strip_tags($_SESSION['username1']);
$photo = strip_tags($_SESSION['photo1']);
$email = strip_tags($_SESSION['email1']);




$mt = microtime(true);
$timer = time();
include("time/now.fn");
$created_time=strip_tags($now);
$dt2=date("Y-m-d H:i:s");
$title = trim(strip_tags($_POST['title']));

//replace any space with hyphen
$sp ='-';
$tt = time();
$title_seo = str_replace(' ', '-', $title.$sp.$tt);


$offering = strip_tags($_POST['offering']);
$messaging = trim(strip_tags($_POST['messaging']));
$help_category = strip_tags($_POST['help_category']);
$offering1 = str_replace(' ', '-', $offering);




$video_url= strip_tags($_POST['video_url']);


//test for presence of certain characters to validate url link

if(strpos($video_url, 'http://') !== false){
//echo "yes found!";
}

elseif(strpos($video_url, 'https://') !== false){
//echo "yes found1!";
} 

else{
//echo 3;
echo "<div style='color:white;background:red;padding:10px;'>Youtube Video url must begin with either Http or https</div>";
exit();
} 




if(strpos($video_url, 'watch') !== false){
//echo "yes found!";
$uv = explode("=",$video_url);
$video_id = end($uv);
$video_type = 'youtube';
} 

elseif(strpos($video_url, 'be') !== false){
//echo "yes found!";
$uv = explode("/",$video_url);
$video_id = end($uv);
$video_type = 'youtube';
} 

else{
//not found
//echo 4;
echo "<div style='color:white;background:red;padding:10px;'>Only Youtube Video url is allowed</div>";
exit();
}






// initialize settings parameters.
include('settings.php');

// Get Google Maps Geo-Cordinates API Calla
$geo_address = trim($_POST['geo_address']);

$address = urlencode($geo_address);
// geocode geo location address to longitudes and latitudes

$call_url ="https://maps.googleapis.com/maps/api/geocode/json?key=$google_map_keys&address=$address&sensor=false";
 $res = file_get_contents($call_url);
 $json = json_decode($res, true);
//print_r($json);

        if($json['status']='OK'){

         $lat = $json['results'][0]['geometry']['location']['lat'];
         $lng = $json['results'][0]['geometry']['location']['lng'];
         $formatted_address = $json['results'][0]['formatted_address'];

}else{
echo "<div  style='background:red;color:white;padding:8px;border:none;' class='' id='alerts_reg'>Address Could not be Formatted via Google Map Reverse Geo-Codings. Please Try Again</div>";
exit();
}

         echo $lat = $json['results'][0]['geometry']['location']['lat'];
         echo $lng = $json['results'][0]['geometry']['location']['lng'];
		 


        if($offering1 !=''){
          



// Insert Into in Tigergraph Database

//include('settings.php');
         

$data_param='
{
  "vertices": {
    "'.$table_posts.'": {
      "'.$tt.'": {

 "title": {
           "value": "'.$title.'"
         },

 "title_seo": {
           "value": "'.$title_seo.'"
         },
 "content": {
           "value": "'.$messaging.'"
         },
 "userid": {
           "value": "'.$uid.'"
         },
 "fullname": {
           "value":  "'.$fullname.'"
         },
 "userphoto": {
           "value":  "'.$photo.'"
         },

        "points": {
           "value": "100"
         },

 "help_category": {
           "value":  "'.$help_category.'"
         },

 "offering": {
           "value":  "'.$offering.'"
         },

 "total_comments": {
           "value":  "0"
         },

 "data_type": {
           "value":  "video"
         },
 "timer": {
           "value": "'.$timer.'"
         },
"video": {
           "value": "'.$video_id.'"
         },
"address": {
           "value": "'.$geo_address.'"
         },
 "latitude": {
           "value": "'.$lat.'"
         },
 "longitude": {
           "value": "'.$lng.'"
         }
      }
    }
  }
}';




$url ="$tg_url:9000/graph/$graph_db";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $tg_accesstoken"));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
 echo $output = curl_exec($ch); 


if($output ==''){
echo "<div style='background:red;color:white;padding:8px;border:none;'>Ensure there is Internet Connection and Try Again</div>";
exit();
}


$json = json_decode($output, true);
$msg = $json["message"];
if($msg !=''){
echo "<div style='background:red;color:white;padding:8px;border:none;'>Error Message: $msg</div>";
}

$res = $json["results"][0]["accepted_vertices"];
if($res == 1){

echo "<div style='background:green;color:white;padding:8px;border:none;'>Data Successfully Inserted</div>";
}














// Get Users Info from users table Vertex and then update the Posts Counts for the User in Tigergraph

$url ="$tg_url:9000/graph/$graph_db/vertices/$table_users/$email";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $tg_accesstoken")); 
//curl_setopt($ch, CURLOPT_HTTPHEADER, array("accept: application/json", 'Content-Type: application/json'));  
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch); 

if($output ==''){
echo "<div style='background:red;color:white;padding:8px;border:none;'>Ensure there is Internet Connection and Try Again</div>";
exit();
}



$json = json_decode($output, true);
$msg = $json["message"];


$points = $json["results"][0]["attributes"]["points"];
$posts = $json["results"][0]["attributes"]["posts"];
$vertex_id = $json["results"][0]["v_id"];
$email_x = $vertex_id;

if($email !=$email_x){
echo "<div style='background:red;color:white;padding:8px;border:none;'>There is something wrong with Users Email Address...</div>";
exit();
}




$counter_points=$points;
$new_count = 50;
$final_count = $counter_points + $new_count;


$counter_posts=$posts;
$new_count_posts = 1;
$final_count_posts = $counter_posts + $new_count_posts;


//  update Users Table Vertex for Users posting Points


$data_param2='
{
  "vertices": {
    "'.$table_users.'": {
      "'.$email.'": {
 "points": {
           "value": "'.$final_count.'"
         },
 "posts": {
           "value": "'.$final_count_posts.'"
         }

      }
    }
  }
}';




$url ="$tg_url:9000/graph/$graph_db";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $tg_accesstoken"));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param2);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch); 

$json = json_decode($output, true);
$msg = $json["message"];
if($msg !=''){
echo "<div style='background:red;color:white;padding:8px;border:none;'>Error Message: $msg</div>";
}

$res = $json["results"][0]["accepted_vertices"];
if($res == 1){

echo "<div style='background:green;color:white;padding:8px;border:none;'>Data Successfully Updated</div>";
}










//  update Posts Table Vertex for Posts Points


$data_param2='
{
  "vertices": {
    "'.$table_posts.'": {
      "'.$tt.'": {
 "points": {
           "value": "'.$final_count.'"
         }

      }
    }
  }
}';




$url ="$tg_url:9000/graph/$graph_db";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $tg_accesstoken"));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param2);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch); 

$json = json_decode($output, true);
$msg = $json["message"];
if($msg !=''){
echo "<div style='background:red;color:white;padding:8px;border:none;'>Error Message: $msg</div>";
}

$res = $json["results"][0]["accepted_vertices"];
if($res == 1){

echo "<div style='background:green;color:white;padding:8px;border:none;'>Data Successfully Updated 2</div>";
}







// update notification table vertex to send notifications to all registered Users

$url1 ="$tg_url:9000/graph/$graph_db/vertices/$table_users";

$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $url1);
//curl_setopt($ch1, CURLOPT_POST, TRUE);
curl_setopt($ch1, CURLOPT_HTTPHEADER, array("Authorization: Bearer $tg_accesstoken")); 
//curl_setopt($ch1, CURLOPT_HTTPHEADER, array("accept: application/json", 'Content-Type: application/json'));  
//curl_setopt($ch1, CURLOPT_POSTFIELDS, $data_param);
curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET");

//curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, TRUE);
 echo $output1 = curl_exec($ch1); 

if($output1 ==''){
echo "<div style='background:red;color:white;padding:8px;border:none;'>Ensure there is Internet Connection and Try Again</div>";
//exit();
}



$json1 = json_decode($output1, true);
$msg1 = $json1["message"];
$vertex_id1 = $json1["results"][0]["v_id"];
$email_x1 = $vertex_id1;

if($msg1 !=''){
echo "<div style='background:red;color:white;padding:8px;border:none;'>Error Message: ($msg1)</div>";
exit();
}


if($vertex_id1 ==''){
echo "<div style='background:red;color:white;padding:8px;border:none;'>No Records found  Tigergraph Database Yet..</div>";
exit();
}





foreach($json1["results"] as $row){

$vertex_id = $row["v_id"];
$vertex_type = $row["v_type"];
$id_email = $vertex_id;

$userid_x = $row["attributes"]["uid"];



$photo = htmlentities(htmlentities($row["attributes"]["photo"], ENT_QUOTES, "UTF-8"));

$timer = htmlentities(htmlentities($row["attributes"]["timer"], ENT_QUOTES, "UTF-8"));
$fullname = htmlentities(htmlentities($row["attributes"]["fullname"], ENT_QUOTES, "UTF-8"));
$points = htmlentities(htmlentities($row["attributes"]["points"], ENT_QUOTES, "UTF-8"));
$posts = htmlentities(htmlentities($row["attributes"]["posts"], ENT_QUOTES, "UTF-8"));
$comments = htmlentities(htmlentities($row["attributes"]["comments"], ENT_QUOTES, "UTF-8"));



// Insert into notification vertex


$notify_id = time();

$data_param2='
{
  "vertices": {
    "'.$table_notification.'": {
      "'.$notify_id.'": {
 "post_id": {
           "value": "'.$tt.'"
         },
"userid": {
           "value": "'.$uid.'"
         },
"fullname": {
           "value": "'.$fullname.'"
         },
"photo": {
           "value": "'.$photo.'"
         },
"reciever_id": {
           "value": "'.$userid_x.'"
         },
"status": {
           "value": "unread"
         },
"data_type": {
           "value": "post"
         },
"timing": {
           "value": "'.$notify_id.'"
         },
"title": {
           "value": "'.$title.'"
         },
 "title_seo": {
           "value": "'.$title_seo.'"
         }

      }
    }
  }
}';




$url ="$tg_url:9000/graph/$graph_db";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $tg_accesstoken"));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param2);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch); 

$json = json_decode($output, true);
$msg = $json["message"];
if($msg !=''){
echo "<div style='background:red;color:white;padding:8px;border:none;'>Error Message: $msg</div>";
}

$resx = $json["results"][0]["accepted_vertices"];
if($resx == 1){

echo "<div style='background:green;color:white;padding:8px;border:none;'>Notification Successfully sent..</div>";
}





}






echo "<script>alert('Youtube Video Submission Successful');
window.location='create_video.php'</script>";


//echo 1;	

}
else{
echo "<div style='background:red;color:white;padding:8px;border:none;'>Post Submission Failed</div>";
//echo 2;
}




?>