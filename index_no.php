<html>
    <head>
        <title>选择班级</title>
	    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/css/mdui.min.css">
	    <link rel="stylesheet" href="all-a.css">
        <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/js/mdui.min.js"></script>
    </head>
    <body background="https://www.toptal.com/designers/subtlepatterns/patterns/repeated-square.png">
        <center>
            <h2>没有找到班级参数，请选择班级</h2>
        </center>
        <br><br>
        <style>
            .beauty-mdui{
                padding-right: 5%;
                padding-left: 5%;
            }
        </style>
        <div class="beauty-mdui">
            <div class="mdui-table-fluid">
                <table class="mdui-table">
                    <thead>
                        <tr>
                            <th>班级</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            $db = mysqli_connect("localhost","log_sys","wabadmin1","log_sys");
                            $commd = "select * from titles";
                            $result = mysqli_query($db,$commd);
                            $result = mysqli_fetch_all($result);
                            foreach ($result as $class) {
                                $title = $class[1];
                                $classname = $class[0];
                                echo("<tr>");
                                echo("<td>$title</td>");
                                echo("<td><button onclick=\"window.location.href = 'http://log.bsot.cn/?class=$classname'\" class=\"mdui-btn mdui-ripple\">进入</button></td>");
                                echo("</tr>");
                            }
                            
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>