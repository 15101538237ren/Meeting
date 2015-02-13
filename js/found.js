// JavaScript Document
function check_submit(){
    if(found.characters.value==""){
        alert("查询条件不允许为空！");found.characters.focus();return false;
    }
    found.submit();
}