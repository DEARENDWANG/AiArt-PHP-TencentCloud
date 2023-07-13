<?php
require_once '../vendor/autoload.php';
use TencentCloud\Common\Credential;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Profile\HttpProfile;
use TencentCloud\Common\Exception\TencentCloudSDKException;
use TencentCloud\Aiart\V20221229\AiartClient;
use TencentCloud\Aiart\V20221229\Models\TextToImageRequest;

try {
    // 密钥，获取信息：https://console.cloud.tencent.com/cam/capi
    $cred = new Credential("your SecretId", "your SecretKey");

    $httpProfile = new HttpProfile();
    $httpProfile->setEndpoint("aiart.tencentcloudapi.com");

    $clientProfile = new ClientProfile();
    $clientProfile->setHttpProfile($httpProfile);

    // 地域域名介入
    $client = new AiartClient($cred, "ap-shanghai", $clientProfile);

    $keyword = $_GET['prompt'] ?? '';
    $styles = $_GET['styles'] ?? '';
    $resolution = $_GET['resolution'] ?? '';
    $logoAdd = $_GET['logoAdd'] ?? '';

    $logoAdd = intval($logoAdd);

    $req = new TextToImageRequest();

    // 使用获取到的参数值设置请求参数
    $params = array(
        "Prompt" => $keyword,
        "Styles" => array($styles),
        "ResultConfig" => array(
            "Resolution" => $resolution
        ),
        "LogoAdd" => $logoAdd
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