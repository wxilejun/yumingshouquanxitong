<?php
    // 不提示错误信息
    error_reporting(0);
    
    // 前端信息
    $yuming = $_GET['yuming'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>授权系统</title>

    <!-- 初始化样式 -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
        }

        body {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <style>
        #Main {
            width: 70%;
            margin: 20px auto;
        }

        #Title {
            font-size: 1.2em;
        }

        form {
            margin-top: 10px;
        }

        form input {
            border: none;
            background-color: #ffffff;
            padding: 6px 10px;
            border: 1px solid #dddddd;
        }

        form button {
            border: none;
            background-color: #0579de;
            padding: 4px 10px;
            border-radius: 2px;
            color: #ffffff;
        }

        .Title {
            font-size: 1em;
            text-shadow: 1px 1px 1px #dddddd;
            display: block;
        }

        .Info {
            color: #a1a1a1;
        }

        /* 适配宽度小于 900像素 */
        @media screen and (max-width: 900px) {
            form input {
                display: block;
                width: 90%;
                padding: 10px 10px;
            }

            form button {
                margin-top: 10px;
                padding: 10px;
            }
            
            .Title {
                margin-top: 10px;
            }
        }

        /* 适配宽度大于 900像素 */
        @media screen and (min-width: 900px) {
            form button {
                display: block;
                width: 20%;
                margin: 10px auto auto auto;
                padding: 10px 20px;
            }

            form input {
                width: 70%;
                display: block;
                margin: 5% auto auto auto;
                padding: 10px 20px;
                font-size: 20px;

                text-align: center;
            }
        }
    </style>
    <div id="Main">
        <span id="Title">查询授权域名</span>
        <form action="" method="get">
            <input type="text" placeholder="域名" name="yuming">
            <button>查询</button>

            <?php
                // 开始查询
                if ($yuming != null) {
                    // 获取数据
                    $result = file_get_contents('info/yuming.txt');
                    // 拿到信息并返回数组
                    $resultArray = explode("\r\n", $result);
                }
            ?>
        </form>
        <span class="Title" style="display: none;">授权情况</span>
        <span class="Info" style="display: none;"><?php
                // 开始查询
                for ($i = 0; $i < count($resultArray); $i ++) {
                    if ($yuming == $resultArray[$i]) {
                        echo "<script>
                            document.getElementsByClassName('Info')[0].innerText = '已授权';
                            document.getElementsByClassName('Info')[0].style.color = 'rgba(0, 116, 40, 0.61)';
                        </script>";

                        echo "<script>
                            document.getElementsByClassName('Info')[0].style.display = 'inline-block';
                        </script>";

                        echo "<script>
                            document.getElementsByClassName('Title')[0].style.display = 'block';
                        </script>";
                        
                        break;
                    } else {
                        echo "<script>
                            document.getElementsByClassName('Info')[0].innerText = '未授权';
                        </script>";

                        echo "<script>
                            document.getElementsByClassName('Info')[0].style.display = 'inline-block';
                        </script>";

                        echo "<script>
                            document.getElementsByClassName('Title')[0].style.display = 'block';
                        </script>";
                    }
                }
            ?></span>
    </div>
</body>
</html>