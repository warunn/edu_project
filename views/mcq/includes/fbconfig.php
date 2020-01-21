<?php
//NEED TO BE UPLOAD
require_once("initial.php");
//session_start();
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '392736247808676','d269899df87072d5bfe0d408baf5199a' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper(URL."views/article/includes/fbconfig.php" );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // User logged in, get the AccessToken entity.
  $accessToken = $session->getAccessToken();
  // Exchange the short-lived token for a long-lived token.
  //$longLivedAccessToken = $accessToken->extend();
  // graph api request for user data $session, 'GET', '/me/accounts?fields=name,access_token,perms'
  
  $request = new FacebookRequest( $session, 'GET', '/me?fields=name,email,picture');
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
  //print_r($graphObject);
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	    $dbCon = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
	    $sql="select * from fbuser where fbid={$fbid}";
	    //echo $sql;
	    $sth=$dbCon->prepare($sql);
	    $sth->execute();
	    $obj_array=$sth->fetchAll();
	    if (empty($obj_array)){
	      $sql="insert into fbuser(fbid,fbfullname,femail) values({$fbid},'{$fbfullname}','{$femail}')";
	      //echo $sql;
	      $sth=$dbCon->prepare($sql);
	      $sth->execute();
	    }
	    if (!(file_exists("../../../pic/fb/{$fbid}.jpg"))){
	      $handle = fopen('../../../pic/fb/'.$fbid.'.jpg', 'x');
	      fclose($handle);
	      copy("https://graph.facebook.com/{$fbid}/picture?height=200&width=200","../../../pic/fb/{$fbid}.jpg");
	    }
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
    /* ---- header location after session ----*/
    
 $cpage=$_SESSION["cpage"];
 $_SESSION["com"]=true;
 header("Location: ".$cpage);
 
} else {
  $loginUrl = $helper->getLoginUrl(array('email'));
 header("Location: ".$loginUrl);
}
?>