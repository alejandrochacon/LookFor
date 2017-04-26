<?php


class defaultRepository
{
    public static function getVideoId($sucheingabe){

      require '../vendor/autoload.php';

$fbApp = new Facebook\FacebookApp(
    '1159851510827809',
    'dd5f7d41d28eb04e17ae3fcc990be1ff'
);
$appToken = 'EAAQe4PlLiyEBAMxGhlxw0rZCgKWKwqEZAPZCmm1ZBhniNJXki0yikhPCqNpYyD2vnphiNqEboyXUBs7nL8xTO34E9pFI9ZCFQAyIsAUeC95Tl831WRAZCuVvrEA89tsRxM5ZBhKKwhDBaEDLVc8YHsolRruLpZCMZBqAZD';
//$aleToken = 'EAACEdEose0cBAPgWaLLF0v3KajlMn8ttZCzAQjQZAFHLXrfYonypG7Y7kAc2LKb5FsekgMEVD72ql7VBaNCApsRsv388XbXyeZCOWEnVZAxVnX3AbMZALtcP6T4rZAuXg7nYoTjE9QBYSMRFBMN1AmzhApbDBdjQBPQZB9CxLnbS1q3G9A93nlhZAEMdqAPnOCYZD';

$expires = time() + 60 * 60 * 2;
$accessTokenShort = new Facebook\Authentication\AccessToken($appToken, $expires);
$limit = 6;

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
    "/search?q=$sucheingabe&type=page&limit=$limit&fields=id"
);

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

$graphNode = $response->getGraphEdge();
$nameResultSize = count($graphNode);

$videoIdArray = array();
$batch = array();

for($i = 0; $i < $nameResultSize; $i++){

    $userId = $graphNode[$i]['id'];

    $requestVideo = $fb->request('GET', "/$userId/videos?limit=5&fields=id");
          array_push($batch, [
        "video-request$i" => $requestVideo
        ]);

}

if($nameResultSize > 0){
  try {//send videos request
    $responses = $fb->sendBatchRequest($batch);
    $objects = $responses->getGraphObject();
    } catch (FacebookRequestException $e) {
        //When Request returns an error
        echo 'FacebookRequestException returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

foreach ($objects as $object) {
  $videos = json_decode($object['body']);
  $videoIdsSum = count($videos->data);
  for($n = 0; $n < $videoIdsSum; $n++){
    array_push($videoIdArray, $videos->data[$n]->id);
  }
}

return $videoIdArray;

}else{
  return $videoIdArray;
}

}
}
