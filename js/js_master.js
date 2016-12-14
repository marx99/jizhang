  $(document).ready(function(){
	  $("#account_add").click(function(){
		var max_1 = parseInt($("#max_1").val());
		if (max_1 >= 9)
		{
			return false;
		}
		$("#max_1").val(max_1+1);
		$("#account_tb").append(' <tr><td><input type="text" style="width:30px;" name="item_no_1_' + max_1 + '" value="' + (max_1 + 1) + '"></input></td><td><input type="text" name="item_name_1_' + max_1 + '" value=""></input></td><td></td></tr>');
	  });

	  $("#shouru_add").click(function(){
		var max_2 = parseInt($("#max_2").val());
		if (max_2 >= 9)
		{
			return false;
		}
		$("#max_2").val(max_2+1);
		$("#shouru_tb").append(' <tr><td><input type="text" style="width:30px;" name="item_no_2_' + max_2 + '" value="' + (max_2 + 1) + '"></input></td><td><input type="text" name="item_name_2_' + max_2 + '" value=""></input></td><td></td></tr>');
	  });

	  $("#zhichu_add").click(function(){
		var max_3 = parseInt($("#max_3").val());
		if (max_3 >= 9)
		{
			return false;
		}
		$("#max_3").val(max_3+1);
		$("#zhichu_tb").append(' <tr><td><input type="text" style="width:30px;" name="item_no_3_' + max_3 + '" value="' + (max_3 + 1) + '"></input></td><td><input type="text" name="item_name_3_' + max_3 + '" value=""></input></td><td></td></tr>');
	  });
});