# AiArt-PHP-TencentCloud
腾讯云Ai绘画，文生图api请求示例
# 安装 TencentCloud SDK PHP
通过 Composer 安装，执行：<code>composer require tencentcloud/aiart</code>
# 请求示例
### 直接请求
<pre>https://example.com/api.php?prompt=提示词&styles=绘画风格&resolution=尺寸</pre>
### url携带密钥请求
<pre>https://example.com/api.php?prompt=提示词&styles=绘画风格&resolution=尺寸&secretId=密钥&secretKey=密钥</pre>
# 文生图风格列表
| 风格类型  | 编号 | 风格类型  | 编号 |
| ---- | ---- | ---- | ---- |
| 水墨画  | 101  | 肖像画  | 111  |
| 概念艺术  | 102  | 黑白素描画  | 112  |
| 油画  | 103  | 赛博朋克  | 113  |
| 水彩画  | 104  | 科幻风格  | 114  |
| 厚涂风格  | 106  | 暗黑风格  | 115  |
| 插图  | 107  | 日系动漫  | 201  |
| 剪纸风格  | 108  | 怪兽风格  | 202  |
| 印象派  | 109  | 游戏卡通手绘  | 301  |
| 2.5D  | 110  | 通用写实风格  | 301  |
# 尺寸信息
| 方图  | 竖图 | 横图 |
| ---- | ---- |  ---- |
| 768:768  | 768:1024  | 1024:768  |
