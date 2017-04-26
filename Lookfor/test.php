<?php
require __DIR__ . '/vendor/autoload.php';

$fbApp = new Facebook\FacebookApp(
  '1159851510827809',
  'dd5f7d41d28eb04e17ae3fcc990be1ff'
  );
$appToken = 'EAAQe4PlLiyEBAMxGhlxw0rZCgKWKwqEZAPZCmm1ZBhniNJXki0yikhPCqNpYyD2vnphiNqEboyXUBs7nL8xTO34E9pFI9ZCFQAyIsAUeC95Tl831WRAZCuVvrEA89tsRxM5ZBhKKwhDBaEDLVc8YHsolRruLpZCMZBqAZD';
//$aleToken = 'EAACEdEose0cBAPgWaLLF0v3KajlMn8ttZCzAQjQZAFHLXrfYonypG7Y7kAc2LKb5FsekgMEVD72ql7VBaNCApsRsv388XbXyeZCOWEnVZAxVnX3AbMZALtcP6T4rZAuXg7nYoTjE9QBYSMRFBMN1AmzhApbDBdjQBPQZB9CxLnbS1q3G9A93nlhZAEMdqAPnOCYZD';
$nameSearchParam = "srf";

$expires = time() + 60 * 60 * 2;
$accessTokenShort = new Facebook\Authentication\AccessToken($appToken, $expires);
$limit = 15;

$fb = new \Facebook\Facebook([
  'app_id' => '1159851510827809',
  'app_secret' => 'dd5f7d41d28eb04e17ae3fcc990be1ff',
  'default_graph_version' => 'v2.9',
  'default_access_token' => 'EAAQe4PlLiyEBAMxGhlxw0rZCgKWKwqEZAPZCmm1ZBhniNJXki0yikhPCqNpYyD2vnphiNqEboyXUBs7nL8xTO34E9pFI9ZCFQAyIsAUeC95Tl831WRAZCuVvrEA89tsRxM5ZBhKKwhDBaEDLVc8YHsolRruLpZCMZBqAZD'
]);


// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();


//Name search
$request = new Facebook\FacebookRequest(
  $fbApp,
  'EAAQe4PlLiyEBAMxGhlxw0rZCgKWKwqEZAPZCmm1ZBhniNJXki0yikhPCqNpYyD2vnphiNqEboyXUBs7nL8xTO34E9pFI9ZCFQAyIsAUeC95Tl831WRAZCuVvrEA89tsRxM5ZBhKKwhDBaEDLVc8YHsolRruLpZCMZBqAZD',
  'GET',
  "/search?q=$nameSearchParam&type=page&fields=id"
);

//$videoIdArray

//send name search request
try {
  $response = $fb->getClient()->sendRequest($request);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

//$graphNode = $response->getGraphNode();
$graphNode = $response->getGraphEdge();

//echo $graphNode;
$nameResultSize = count($graphNode);

//print_r($graphNode);
$videoIdArray = array();

for($i = 0; $i < $nameResultSize; $i++){
  //echo ($graphNode[$i]['id']);
  //echo '<br/>';
  $userId = $graphNode[$i]['id'];
  //echo "user id $userId";

  $request = new Facebook\FacebookRequest(
    $fbApp,
    'EAAQe4PlLiyEBAMxGhlxw0rZCgKWKwqEZAPZCmm1ZBhniNJXki0yikhPCqNpYyD2vnphiNqEboyXUBs7nL8xTO34E9pFI9ZCFQAyIsAUeC95Tl831WRAZCuVvrEA89tsRxM5ZBhKKwhDBaEDLVc8YHsolRruLpZCMZBqAZD',
    'GET',
    "/$userId/videos?fields=id"
  );


  try {
    $response = $fb->getClient()->sendRequest($request);
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }


  $graphNodeChannelvideos = $response->getGraphEdge();
  $channelvideosResultSize = count($graphNodeChannelvideos);


  for($n = 0; $n < $channelvideosResultSize; $n++){
    //echo ($graphNode[$i]['id']);
    //echo '<br/>';
    $videoId = $graphNodeChannelvideos[$n]['id'];
    array_push($videoIdArray, $videoId);
    //in array füllen



  }

}
return $videoIdArray;
//return $videoIdArray;

  /*
  //echo $graphNode['id'];
  for($i = 0; $i < $nameResultSize; $i++){
    //echo ($graphNode[$i]['id']);
    //echo '<br/>';
    $userId = $graphNode[$i]['id'];


}

//echo 'User name: ' . $graphNode['name'];
//echo 'User id: ' . $graphNode['id'];
//echo 'Video description: ' . $graphNode['description'];
//echo '<br/>';
//echo 'Video id: ' . $graphNode['id'];


*/


?>
