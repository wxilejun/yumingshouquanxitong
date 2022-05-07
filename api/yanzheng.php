<?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://tool.xlj0.com/layout/shouquanxitong/api/index.php?ym='.$_SERVER['SERVER_NAME']);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    $info = json_decode($result);
    if ($info->zt != '已授权') {
        // 如果没有授权 提示
        echo "该站点没有授权";
    } else {
        // 如果授权 提示
        echo "站点已授权";
    }
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