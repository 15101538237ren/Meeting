// JavaScript Document
function check_submit(){
    if(theForm.meeting_name.value==""){
        alert("会议名称不能为空！");theForm.meeting_name.focus();return false;
    }
    if(theForm.meeting_place.value==""){
        alert("会议地点不能为空！");theForm.meeting_place.focus();return false;
    }
    if(theForm.meeting_host.value==""){
        alert("会议主持人不能为空！");theForm.meeting_host.focus();return false;
    }
    if(theForm.meeting_saver.value==""){
        alert("会议记录人不能为空！");theForm.meeting_saver.focus();return false;
    }
    if(theForm.meeting_present.value==""){
        alert("出席人员不能为空！");theForm.meeting_present.focus();return false;
    }
    if(theForm.textarea.value==""){
        alert("会议摘要不能为空！");theForm.textarea.focus();return false;
    }
    theForm.submit();

}