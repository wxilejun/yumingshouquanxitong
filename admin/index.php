<?php
    // 初始化 SESSION
    session_start([
        'cookie_lifetime' => 86400,
    ]);

    // 不提示错误信息
    error_reporting(0);

    // 登录页面信息
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // 添加域名
    $yuming = $_POST['yuming'];
    if ($yuming != null) {
        $result = file_get_contents('../info/yuming.txt');
        $file = fopen('../info/yuming.txt', 'w');
        fwrite($file, $result."\r\n".$yuming);
        fclose($file);
    }

    if ($_SESSION['username'] != null) {
        include('./html/index.html');
    } else {
        header('Location: ./html/login.html');
    }

    // 查找信息
    // $users = file_get_contents('../info/users.txt');
    // $usersArray = explode("\r\n", $users);
    
    // if ($username != null) {
    //     for ($i = 0; $i < count($usersArray); $i ++) {
    //         if ($username == $usersArray[$i]) {
    //             if ($password == $usersArray[$i + 1]) {
                    // if ($_SESSION['username'] == null) {
                    //     include('./html/index.html');
                    // }

                    // // 保存登录信息
                    // $_SESSION['username'] = $usersArray[$i];
                    // $_SESSION['password'] = $usersArray[$i + 1];
    //             } else {
    //                 echo "密码错误";
    //             }
    //         }
    //     }
    // }

    // include('./info/usersql.php');

    $usersInfo = ['admin','shouquanxitong0'];
    
    if ($username != null) {
        for ($i = 0; $i < count($usersInfo); $i ++) {
            if ($username == $usersInfo[$i]) {
                if ($password == $usersInfo[$i + 1]) {
                    if ($_SESSION['username'] == null) {
                        include('./html/index.html');
                    }

                    // 保存登录信息
                    $_SESSION['username'] = $usersInfo[$i];
                    $_SESSION['password'] = $usersInfo[$i + 1];
                }
            }
        }
    }
?>