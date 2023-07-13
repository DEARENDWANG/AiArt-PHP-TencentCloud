<?php
//根据自己的sdk位置进行更改
require_once '../vendor/autoload.php';
use TencentCloud\Common\Credential;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Profile\HttpProfile;
use TencentCloud\Common\Exception\TencentCloudSDKException;
use TencentCloud\Aiart\V20221229\AiartClient;
use TencentCloud\Aiart\V20221229\Models\TextToImageRequest;

try {
    // 获取URL参数值
    $secretId = $_GET['secretId'];
    $secretKey = $_GET['secretKey'];

    // 检查参数是否存在
    if (empty($secretId) || empty($secretKey)) {
        $errorResponse = array(
            'msg' => '请检查链接中是否存在正确的的secretId和secretKey'
        );
        $jsonResponse = json_encode($errorResponse, JSON_UNESCAPED_UNICODE);
        die($jsonResponse);
    }

    // 密钥，获取信息：https://console.cloud.tencent.com/cam/capi
    $cred = new Credential($secretId, $secretKey);

    $httpProfile = new HttpProfile();
    $httpProfile->setEndpoint("aiart.tencentcloudapi.com");

    $clientProfile = new ClientProfile();
    $clientProfile->setHttpProfile($httpProfile);

    // 地域域名介入
    $client = new AiartClient($cred, "ap-shanghai", $clientProfile);

    $keyword = $_GET['prompt'] ?? '';
    $styles = $_GET['styles'] ?? '';
    $resolution = $_GET['resolution'] ?? '';

    $req = new TextToImageRequest();

    // 使用获取到的参数值设置请求参数
    $params = array(
        "Prompt" => $keyword,
        "Styles" => array($styles),
        "ResultConfig" => array(
            "Resolution" => $resolution
        ),
    );
    $req->fromJsonString(json_encode($params));

    // 发送请求并获取响应
    $resp = $client->TextToImage($req);

    // 输出响应
    print_r($resp->toJsonString());
} catch (TencentCloudSDKException $e) {
    echo $e;
}
?>
