<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js'></script>

<div class="fancy">
	<h3>新建事件</h3>
    <form id="add_form" action="do.php" method="post">
    <input type="hidden" name="action" value="add">
    <p>日程内容：<input type="text" class="input" name="event" id="event" style="width:320px"
 placeholder="记录你将要做的一件事..."></p>
    <p>开始时间：<input type="text" class="input datepicker" name="startdate" id="startdate"
 value="<?php echo $_GET['date'];?>">
    <span id="sel_start" style="display:none"><select name="s_hour">
    	<option value="00">00</option>
        ...<!--省略多个option，下同-->
    </select>:
    <select name="s_minute">
    	<option value="00" selected>00</option>
        ...
    </select>
    </span>
    </p>
    <p id="p_endtime" style="display:none">结束时间：<input type="text" class="input datepicker" 
name="enddate" id="enddate" value="<?php echo $_GET['date'];?>">
    <span id="sel_end" style="display:none"><select name="e_hour">
    	<option value="00">00</option>
    	...
    </select>:
    <select name="e_minute">
    	<option value="00" selected>00</option>
        ...
    </select>
    </span>
    </p>
    <p>
    <label><input type="checkbox" value="1" id="isallday" name="isallday" checked> 全天</label>
    <label><input type="checkbox" value="1" id="isend" name="isend"> 结束时间</label>
    </p>
    <div class="sub_btn"><span class="del"><input type="button" class="btn btn_del"
  id="del_event" value="删除"></span>
    <input type="submit" class="btn btn_ok" value="确定"> <input type="button" 
class="btn btn_cancel" value="取消" onClick="$.fancybox.close()"></div>
    </form>
</div>


<script>
    $(function(){
        $(".datepicker").datepicker();//调用日历选择器
        $("#isallday").click(function(){//是否是全天事件
            if($("#sel_start").css("display")=="none"){
                $("#sel_start,#sel_end").show();
            }else{
                $("#sel_start,#sel_end").hide();
            }
        });
        
        $("#isend").click(function(){//是否有结束时间
            if($("#p_endtime").css("display")=="none"){
                $("#p_endtime").show();
            }else{
                $("#p_endtime").hide();
            }
            $.fancybox.resize();//调整高度自适应
        });
    });

    $(function(){
	//提交表单
	$('#add_form').ajaxForm({
		beforeSubmit: showRequest, //表单验证
        success: showResponse //成功返回
        }); 
    });

    function showRequest(){
        var events = $("#event").val();
        if(events==''){
            alert("请输入日程内容！");
            $("#event").focus();
            return false;
        }
    }

    $(function showResponse(responseText, statusText, xhr, $form){
        if(statusText=="success"){	
            if(responseText==1){
                $.fancybox.close();//关闭弹出层
                $('#test').fullCalendar('refetchEvents'); //重新获取所有事件数据
            }else{
                alert(responseText);
            }
        }else{
            alert(statusText);
        }
    });

</script>