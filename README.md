简述
这是一个基于 HTML,CSS,JavaScript,PHP 语言开发的程序
总程序压缩包大小 仅 500Kb (V1.0)
程序有后台且无数据库! 为了高性能以及极致的加载速度

授权域名信息 info/yuming.txt 一行一个授权域名，可以手动修改
下载解压即可使用，如果报错请使用 PHP 5.6 或以上版本使用
如果后台无法使用，请给 index.php 和 admin/index.php 文件读写权限

更新
v1.2 : 增加新功能(API接口查询)Json格式的接口，增加验证端就是别人使用网站自动检查域名是否授权(自动验证授权)
v1.1 : 提高安全性，账号密码储存于独立数据
v1.0 : 全数据都储存在 info 文件夹里
代码
自动验证授权部分代码展示

<?php
    // $host是接口地址，请以?ym=结尾
    $host = "https://tool.xlj0.com/layout/shouquanxitong/api/index.php?ym=";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $host.$_SERVER['SERVER_NAME']);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    $info = json_decode($result);
    if ($info->zt != '已授权') {
        // 如果没有授权 提示
        echo "该站点没有授权";
        include('./shouquan.html');
    } else {
        // 如果授权 提示
        echo "站点已授权";
    }

    // 推荐将PHP代码加密使用
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>授权站点检测</title>
</head>
<body>
    
</body>
</html>
