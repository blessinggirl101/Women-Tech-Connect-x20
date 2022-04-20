<?php 
//error_reporting(0);
//session_start();
//$userid_sess_data = htmlentities(htmlentities($_SESSION['uid2'], ENT_QUOTES, "UTF-8"));
//$email_sess =  htmlentities(htmlentities($_SESSION['email2'], ENT_QUOTES, "UTF-8"));
 // ensure that there is no whitespace and included file settings.php does not have whitespace
header("Content-type: text/xml");
include('settings.php');
// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
//$identity = strip_tags($_GET['identity']);
$url =''.$tg_url.':9000/graph/'.$graph_db.'/vertices/'.$table_posts.' ';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $tg_accesstoken"));  
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch); 
if($output ==''){
echo "Cannot connect to Tigergraph Database. Ensure there is Internet Connection and Try Again";
exit();
}
$json = json_decode($output, true);
$msg = $json["message"];
if($msg !=''){
echo "Error Message: $msg";
exit();
}
foreach($json["results"] as $row){
$vertex_id = $row["v_id"];
$vertex_type = $row["v_type"];
$id = $vertex_id;
$postid = $id;
$title = $row["attributes"]["title"];
$title_seo = $row["attributes"]["title_seo"];
$content = htmlentities(htmlentities($row["attributes"]["content"], ENT_QUOTES, "UTF-8"));
$timing = htmlentities(htmlentities($row["attributes"]["timer"], ENT_QUOTES, "UTF-8"));
$userid = htmlentities(htmlentities($row["attributes"]["userid"], ENT_QUOTES, "UTF-8"));
$fullname = htmlentities(htmlentities($row["attributes"]["fullname"], ENT_QUOTES, "UTF-8"));
$photo = htmlentities(htmlentities($row["attributes"]["userphoto"], ENT_QUOTES, "UTF-8"));
$address=htmlentities(htmlentities($row["attributes"]["address"], ENT_QUOTES, "UTF-8"));
$lat=htmlentities(htmlentities($row["attributes"]["latitude"], ENT_QUOTES, "UTF-8"));
$lng=htmlentities(htmlentities($row["attributes"]["longitude"], ENT_QUOTES, "UTF-8"));
$data ='public';
$type = 1;
$comments = htmlentities(htmlentities($row["attributes"]["total_comments"], ENT_QUOTES, "UTF-8"));
$points = htmlentities(htmlentities($row["attributes"]["points"], ENT_QUOTES, "UTF-8"));
$help_category = htmlentities(htmlentities($row["attributes"]["help_category"], ENT_QUOTES, "UTF-8"));
$offering = htmlentities(htmlentities($row["attributes"]["offering"], ENT_QUOTES, "UTF-8"));
$status = htmlentities(htmlentities($row["attributes"]["data_type"], ENT_QUOTES, "UTF-8"));
$data_type = htmlentities(htmlentities($row["attributes"]["data_type"], ENT_QUOTES, "UTF-8"));
$p_photo = htmlentities(htmlentities($row["attributes"]["photo"], ENT_QUOTES, "UTF-8"));
$p_video = htmlentities(htmlentities($row["attributes"]["video"], ENT_QUOTES, "UTF-8"));
$images = $photo;
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$id);
  $newnode->setAttribute("name",$fullname);
  $newnode->setAttribute("photo",$photo);
  $newnode->setAttribute("address", $address);
  $newnode->setAttribute("lat", $lat);
  $newnode->setAttribute("lng", $lng);
  $newnode->setAttribute("type", $type);
$newnode->setAttribute("fullname", $fullname);
$newnode->setAttribute("userid", $userid);
$newnode->setAttribute("timing", $timing);
 $newnode->setAttribute("title", $title);
$newnode->setAttribute("title_seo", $title_seo);
 $newnode->setAttribute("content", $content);
$newnode->setAttribute("comments", $comments);
$newnode->setAttribute("images", $images);
$newnode->setAttribute("status", $status);
$newnode->setAttribute("post_status", $offering);
$newnode->setAttribute("help_category", $help_category);
$newnode->setAttribute("data_type", $data_type);
$newnode->setAttribute("p_photo", $p_photo);
$newnode->setAttribute("p_video", $p_video);
}
echo $dom->saveXML();
?>