<?php
    error_reporting(0);
    header("Content-type:application/json; charset=UTF-8");

    $yuming = $_GET['ym'];

    // 开始查询
    if ($yuming != null) {
        // 获取数据
        $result = file_get_contents('../info/yuming.txt');
        // 拿到信息并返回数组
        $resultArray = explode("\r\n", $result);
    }

    $Info = ['ym' => null, 'zt' => null];
    // 判断是否授权
    for ($i = 0; $i < count($resultArray); $i ++) {
        if ($yuming == $resultArray[$i]) {
            $Info['ym'] = $resultArray[$i];
            $Info['zt'] = '已授权';

            break;
        } else {
            $Info['ym'] = $yuming;
            $Info['zt'] = '未授权';
        }
    }

    echo json_encode($Info, JSON_UNESCAPED_UNICODE);
?>