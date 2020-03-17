<?php
    if( isset( $_GET['class'] ) ){
	    $class = $_GET['class'];
	    $db = mysqli_connect( "数据库地址" , "数据库用户名" , "数据库密码" , "数据库名" );
	    $title_selector_com = " select * from titles where class='$class'";
	    $title_selector = mysqli_query( $db , $title_selector_com );
	    $titles = mysqli_fetch_assoc($title_selector);
	    if(empty($titles)){
	        echo("<center><h2>没有找到此班级</h2></center>");
	        exit();
	    }
	    else{
	        session_start();
	        $title = $titles['title'];
	        $_SESSION['title'] = $title;
	        $_SESSION['class'] = $class;
	    }
    }
    else{
        header("refresh:0;签到地址/index_no.php");
        exit();
    }
?>


<html>

	<head>
	    
	    <title><?php echo($title) ?></title>
	    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/css/mdui.min.css">
	    <link rel="stylesheet" href="all-a.css">
        <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/js/mdui.min.js"></script>
	</head>
	<style>
	    .beauty_mdui{
	        padding-left: 5%;
	        padding-right: 5%;
	    };
	    .footer{
	        margin-bottom: 50px;
	    }
	</style>
	<body background='https://www.toptal.com/designers/subtlepatterns/patterns/repeated-square.png'>
	    
	    <div class="mdui-appbar">
          <div class="mdui-toolbar mdui-color-green">
            <a href="javascript:;" class="mdui-typo-headline"><?php echo($class) ?></a>
            <a href="javascript:;" class="mdui-typo-title">签到系统</a>
            <div class="mdui-toolbar-spacer"></div>
            <!--<button onclick="Go_Back()" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">后台</button>-->
            <!--<a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">refresh</i></a>
            <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">more_vert</i></a>-->
          </div>
        </div>
        <script>
            /*function Go_Back(){
                window.location.href = "./admin";
            }*/
        </script>
        <br><br>
        <style>
            .button-r{
                
            }
        </style>
        <div class="beauty_mdui">
            <h2>早上好！美好的一天从签到开始🙂</h2>
            
            <div class="mdui-card">
                  <div class="mdui-card-content">
                      <center>
                          <h2><?php echo($title); ?></h2>
                      </center>
                      
                        <div class="mdui-textfield">
                          <label class="mdui-textfield-label">你的名字：</label>
                          <input class="mdui-textfield-input" type="text" id="name"/>
                        </div>
                        <br>
                        <center><button onclick="Log()" class="mdui-fab mdui-color-theme-accent mdui-ripple button-r"><i class="mdui-icon material-icons">arrow_forward</i></button></center>
                  </div>
            </div>
            
        </div>
        
        <br><br>
        <!--<center>
            <button mdui-dialog="{'target' : '#logged'}" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">已签到的人</button>
            <button mdui-dialog="{'target' : '#no_logged'}" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">未签到的人</button>
	    </center>-->
	    <style>
	        .mdui-dialog{
	            background: url("https://www.toptal.com/designers/subtlepatterns/patterns/canadian-dollar.png");
	        }
	        #live2dcanvas {
                border: 0 !important;
            }
	    </style>
	    <div class="beauty_mdui" id="logged">
            <?php
                
                $time = date("Y-m-d");
                $commd = "select * from users where class='$class' and time='$time'";
                $result = mysqli_query($db,$commd);
                $result = mysqli_fetch_all($result);
                if(empty($result)){
                    echo("<center><h2>今天还没有人签到呢~:)</h2></center>");
                }
                else{
                    echo("
                        <div class=\"mdui-table-fluid\">
                          <table class=\"mdui-table mdui-table-hoverable\">
                            <thead>
                              <tr>
                                <th><center>已签到</center></th>
                                <th><center>签到时间</center></center>
                              </tr>
                            </thead>
                            <tbody>
                                
                                    
                    ");
                    $logged_go = 0;
                    foreach($result as $stu){
                        $logged_go = $logged_go + 1;
                        $stu_name = $stu[2];
                        $time_d = $stu[4];
                        echo("<tr>");
                        echo("<td><center>$stu_name</center></td>");
                        echo("<td><center>$time_d</center></td>");
                        echo("</tr>");
                    }
                    echo("
                    
                        </tbody>
                        </table>
                        <center><h2>签到人数：$logged_go</h2></center>
                        </div>
                    
                    ");
                    
                    
                }
            
            ?>
        </div>
        <br><br><br>
        <div class="beauty_mdui" id="no_logged">
            <?php
                
                $time = date("Y-m-d");
                $commd = "select * from users where class='$class' and time != '$time'";
                $result = mysqli_query($db,$commd);
                $result = mysqli_fetch_all($result);
                if(empty($result)){
                    echo("<center><h2>都已经签过到啦~:)</h2></center>");
                }
                else{
                    echo("
                        <div class=\"mdui-table-fluid\">
                          <table class=\"mdui-table mdui-table-hoverable\">
                            <thead>
                              <tr>
                                <th><center>未签到</center></th>
                                <!--<th><center>状态</center></th>-->
                              </tr>
                            </thead>
                            <tbody>
                                
                                    
                    ");
                    $un_logged_go = 0;
                    foreach($result as $stu){
                        $un_logged_go = $un_logged_go + 1;
                        $stu_name = $stu[2];
                        echo("<tr>");
                        echo("<td><center>$stu_name</center></td>");
                        echo("</tr>");
                    }
                    echo("
                    
                        </tbody>
                        </table>
                        <center><h2>未签到人数：$un_logged_go</h2></center>
                        </div>
                    
                    ");
                    
                    
                }
            
            ?>
            <h3>出现bug和我说呢~ -->同学录入口<button class="mdui-btn mdui-ripple mdui-color-red" onclick="window.location.href='https://forever.yc2017.top'">同学录</button></h3>
            <p>Tip:班级注册码：201711</p>
        </div>
	    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
        function Log() {
            var name = $("#name").val()
            console.log(name)
            $.ajax({
                type: "POST",
                url: "./test-log/log.php" ,// 面向对象版
                // url : "./log.php" //面向过程版
                data: { name :  name , 'class' : '<?php echo($class) ?>' },
                success: function (data) {
                    var result = data.trim()
                    console.log(result)
                    if(result == "log_suc"){
                        
                        if(true){
                            mdui.dialog({
                              title: '你成功了！',
                              content: '恭喜你签到成功，emmmmmmmmmmmmmmmmmm~<br>这里祝你早上好~<br>明天别忘了签到呦~~~',
                              buttons: [
                                {
                                  text: '知道啦',
                                  onClick: function(){
                                      window.location.href = "./?class=<?php echo($class); ?>"
                                  }
                                },
                              ]
                            });
                        }
                    }
                    else{
                        if(result == "logged"){
                            mdui.dialog({
                              title: '签过到了',
                              content: '你今天已经签过到了，无法重复签到呦~ ：）',
                              buttons: [
                                {
                                  text: '好的'
                                },
                              ]
                            });
                        }
                        else{
                            if(result == "No_user"){
                                mdui.dialog({
                                  title: '无名',
                                  content: '没有找到你呢~',
                                  buttons: [
                                    {
                                      text: '好的'
                                    },
                                  ]
                                });
                            }
                            else{
                                if(result == "time_over"){
                                    mdui.dialog({
                                      title: '超时',
                                      content: '已经过了签到时间，无法完成签到：(',
                                      buttons: [
                                        {
                                          text: '好的'
                                        },
                                      ]
                                    });
                                }
                                else{
                                    if(result == "FDQ"){
                                        mdui.dialog({
                                          title: '防代签',
                                          content: '禁止代签，签到没有完成',
                                          buttons: [
                                            {
                                              text: '好的'
                                            },
                                          ]
                                        });
                                    }
                                    else{
                                        mdui.dialog({
                                          title: '数据错误',
                                          content: '数据错误，无法完成签到：(',
                                          buttons: [
                                            {
                                              text: '好的'
                                            },
                                          ]
                                        });
                                    }
                                    
                                }
                            }
                        }
                        
                    }
                },
                error : function(data) {
                  //提交失败的提示词或者其他反馈代码
                    mdui.dialog({
                      title: '失败',
                      content: '数据错误，核心节点丢失',
                      buttons: [
                        {
                          text: '好的'
                        },
                        
                      ]
                    });
                }
            });
        }
    </script>
    <!--<script data-ad-client="ca-pub-6765414320746854" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
    <br><br><br>
        <div class="mdui-divider-dark"></div>
        <center><p id="hitokoto">:D 获取中...</p></center>
        <center><p>数据由Doraemon Brain统计</p></center>
        <script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>
        <center><p class="mdui-typo">Copyright © 2020 <a href="//blog.bsot.cn">cxbsoft</a>. All rights reserved.</p></center>
	</body>

</html>
