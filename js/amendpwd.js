// JavaScript Document
function check_submit(){
    if(amendpwd.newpwd.value==""){
        alert("请输入新密码！");amendpwd.newpwd.focus();return false;
    }
    if(amendpwd.newpwdtwice.value==""){
        alert("请确认新密码！");amendpwd.newpwdtwice.focus();return false;
    }
    if(amendpwd.newpwd.value!=amendpwd.newpwdtwice.value){
        alert("两次输入的密码不一致！");
        return false;
    }
    //found.submit();
}