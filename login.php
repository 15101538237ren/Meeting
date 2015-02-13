<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>test</title>
    <style type="text/css">
        /*相关CSS定义*/

        @import url('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
        @import url('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css');
        @import url('http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');

        body{
            font-family: 'microsoft yahei',Arial,sans-serif;
            background-color: #222;
        }

        .redborder {
            border:2px solid #f96145;
            border-radius:2px;
        }

        .row {
            padding: 20px 0px;
        }

        .bigicon {
            font-size: 97px;
            color: #f08000;
        }

        .loginpanel {
            text-align: center;
            width: 300px;
            border-radius: 0.5rem;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 10px auto;
            background-color: #555;
            padding: 20px;
        }

        input {
            width: 100%;
            margin-bottom: 17px;
            padding: 15px;
            background-color: #ECF4F4;
            border-radius: 2px;
            border: none;
        }

        h2 {
            margin-bottom: 20px;
            font-weight: normal;
            color: #EFEFEF;
        }

        .btn {
            border-radius: 2px;
            padding: 10px;
        }

        .btn span {
            font-size: 27px;
            color: white;
        }

        .buttonwrapper{
            position:relative;
            overflow:hidden;
            height:50px;
        }

        .lockbutton {
            font-size: 27px;
            color: #f96145;
            padding: 10px;
            width:100%;
            position:absolute;
            top:0;
            left:0;
        }

        .loginbutton {
            background-color: #f08000;
            width: 100%;
            -webkit-border-top-right-radius: 0;
            -webkit-border-bottom-right-radius: 0;
            -moz-border-radius-topright: 0;
            -moz-border-radius-bottomright: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            left: -260px;
            position:absolute;
            top:0;
        }


    </style>

</head>
<body>


<script type='text/javascript' src="http://libs.baidu.com/jquery/1.7.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    /*Javascript代码片段，这里使用jQuery*/
    $(document).ready(function() {
        $("#infodiv").hide();
    });
    function check_values() {
        if ($("#username").val().length !== 0 && $("#password").val().length !== 0) {

            $("#loginbtn").animate({ left: '0' , duration: 'slow'});
            $("#lockbtn").animate({ left: '260px' , duration: 'slow'});
        }
    }


    function login(){
        //$('#loading').removeClass('hidden');
        //登录相关后台处理，例如: Ajax请求
        var params = $("input").serialize();
        var url = "login_chk.php";
        $.ajax({
            type: "post",
            url: url,
            data: params,
            success: function(data){
                var backdata = data;
                if(data=="登录成功")
                    location.href='manager.php';
                else
                {
                    $("#returninfo").text(backdata);
                    $("#infodiv").show();
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {  //#3这个error函数调试时非常有用，如果解析不正确，将会弹出错误框
                $('input').text("");
                $("#returninfo").text(backdata);
            }
        });
    };
</script>
<!-- 互动登陆界面HTML及其引入类库 //-->
<!-- Interactive Login - START -->
<div class="container-fluid">

    <div class="row">

        <div class="loginpanel">
            <div id="infodiv" class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <div id="returninfo">Success!</div>
            </div>
            <i id="loading" class="hidden fa fa-spinner fa-spin bigicon"></i>
            <h2>
                <span class="fa fa-quote-left "></span> 登录 <span class="fa fa-quote-right "></span>
            </h2>
            <div>
                <input id="username" name="username" type="text" placeholder="登录账号" onkeypress="check_values();">
                <input id="password" name="password" type="password" placeholder="输入密码" onkeypress="check_values();">

                <div class="buttonwrapper">
                    <button id="loginbtn" class="btn btn-warning loginbutton" onclick="login();">
                        <span class="fa fa-check"></span>
                    </button>
                    <span id="lockbtn" class="fa fa-lock lockbutton redborder"></span>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>