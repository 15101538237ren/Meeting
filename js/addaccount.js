// JavaScript Document
function meeting_chk(){
    if(addaccount.newuser.value==""){
        alert("用户名不能为空");addaccount.newuser.focus();return false;
    }
    if(addaccount.newpwd.value==""){
        alert("新密码不能为空");addaccount.newpwd.focus();return false;
    }
    if(addaccount.newpwdtwice.value==""){
        alert("确认密码不能为空");addaccount.newpwdtwice.focus();return false;
    }
    if(addaccount.newpwdtwice.value!=addaccount.newpwd.value){
        alert("两次输入的密码不一致！");return false;
    }
    //found.submit();
}