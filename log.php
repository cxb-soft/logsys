<?php
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $class = $_POST['class'];
        $db = mysqli_connect("localhost","log_sys","wabadmin1","log_sys");
        $ip=$_SERVER["REMOTE_ADDR"];
        $commd = "select * from users where class='$class' and name='$name'";
        $result = mysqli_query($db,$commd);
        $result = mysqli_fetch_assoc($result);
        $time2 = date("H:i:s");
        $time = date("Y-m-d");
        $time_d = (int)date("H");
        //echo($time_d);
        if(empty($result)){
            echo("No_user");
            exit();
        }
        else{
            //if($time_d < 7){
            if(true){
                if($result['time'] == ""){
                    $commd = "UPDATE users set time='$time' where class='$class' and name='$name'";
                    mysqli_query($db,$commd);
                    $commd = "UPDATE users set ip='$ip' where class='$class' and name='$name'";
                    mysqli_query($db,$commd);
                    $commd = "UPDATE users set time_d='$time2' where class='$class' and name='$name'";
                    mysqli_query($db,$commd);
                    echo('log_suc');
                }
                else{
                    if( strpos($result['time'],$time) ){
                        echo("logged");
                        exit();
                    }
                    else{
                        $commd = "UPDATE users set time='$time' where class='$class' and name='$name'";
                        mysqli_query($db,$commd);
                        $commd = "UPDATE users set ip='$ip' where class='$class' and name='$name'";
                        mysqli_query($db,$commd);
                        $commd = "UPDATE users set time_d='$time2' where class='$class' and name='$name'";
                        mysqli_query($db,$commd);
                        echo("log_suc");
                        
                    }
                }
            }
            else{
                echo("time_over");
            }
        }
    }

?>