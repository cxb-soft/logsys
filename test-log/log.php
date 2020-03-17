<?php
    
    
    class log{
        
        var $result = "No_user";
        function __construct( $name , $ip ){
            
            	$this -> db = mysqli_connect( "数据库地址" , "数据库用户名" , "数据库密码" , "数据库名" );
            $this -> result = "";
            $this -> date_now = date("Y-m-d");
            $this -> time_now = date("H:i:s");
            $this -> name = $name;
            $this -> ip = $ip;
            $this -> time_now_h = date("H");
            
        }
        
        function test(){
            $this -> result = "你好";
        }
        
        function qd(){
            if( $this -> time_now_h < 7 ){
                $commd = "select * from users where name='".$this -> name."'";
                $this -> user_selector = mysqli_query( $this -> db , $commd );
                $this -> user_select = mysqli_fetch_all($this -> user_selector);
                if(!empty( $this -> user_select )){
                    $this -> qd_time = $this -> user_select[0][0];
                    if( $this -> date_now == $this -> qd_time ){
                        $this -> result = "logged";
                    }
                    else{
                        $commd = "update users set time='".$this -> date_now."' where name='".$this -> name."'";
                        @mysqli_query( $this -> db , $commd );
                        $commd = "update users set time_d='".$this -> time_now."' where name='".$this -> name."'";
                        @mysqli_query( $this -> db , $commd );
                        $commd = "update users set ip='".$this -> ip."' where name='".$this -> name."'";
                        @mysqli_query( $this -> db , $commd );
                        $this -> result = "log_suc";
                    }
                }
                else{
                    $this -> result = "No_user";
                }
            }
            else{
                $this -> result = "time_over";
            }
        }
        /*function fdq($ip,$username,$class){
            $this -> command = "select * from users where ip='$ip'";
            $this -> result = mysqli_query($this -> db , $this -> command);
            $this -> result = mysqli_fetch_all($this -> result);
            if(empty($this -> result)){
                return true;
            }
            else{
                if($this -> result[0][2] == $username){
                    return true;
                }
                else{
                    $this -> command = "select * from users where ip='$ip'";
                    $this -> result = mysqli_query($this -> db , $this -> command);
                    $this -> result = mysqli_fetch_all($this -> result);
                    $name_dq = $this -> result[0][2];
                    $date_now = $this -> date_now;
                    $time_now = $this -> time_now;
                    $this -> command = "insert into dq values('$date_now','$time_now','$username','$class','$name_dq')";
                    mysqli_query($this -> db , $this -> command);
                    return false;
                }
            }
        }
        
        function fdqr(){
            $this -> result = "";
            return "FDQ";
        }*/
        
        function __destruct(){
            echo($this -> result);
        }
        
    }
    //$hello = new log("1","1");
    //$hello -> test();
    
    if( $_POST['name'] ){
        $name = $_POST['name'];
        $ip = $_SERVER["REMOTE_ADDR"];
        $class = $_POST['class'];
        $qd_cli = new log( $name , $ip );
        $qd_cli -> qd();
    }
    else{
        exit();
    }
?>
