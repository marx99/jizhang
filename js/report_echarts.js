function SetChart(divid,sql1,title_name,series_name){
  var  myChart = echarts.init(document.getElementById(divid));
  var arr1=[],arr2=[];//alert(sql);
  function arrTest(){
	$.ajax({
	  type:"post",
	  async:false,
	  url:"report/report_json.php",
	  data:{sql:sql1,flg:'1'},
	  dataType:"json",
	  success:function(result){
		if (result) {
		  for (var i = 0; i < result.length; i++) {
			  arr1.push(result[i].name);
			  arr2.push(result[i].age);
		  }
		}
	  },
		error : function(errorMsg) {
			alert("sorry，请求数据失败");
			myChart.hideLoading();
		}
	})
	return arr1,arr2;
  }
  arrTest();
  var  option = {
    title: {
        text: title_name
    },
		tooltip: {
			show: true
		},
		legend: {
		   data:['age']
		},
		xAxis : [
			{
				type : 'category',
				data : arr1
			}
		],
		yAxis : [
			{
				type : 'value'
			}
		],
		series : [
			{
				"name":series_name,
				"type":"bar",
				"data":arr2
			}
		]
	};
	// 为echarts对象加载数据
	myChart.setOption(option);
}

function SetDoubleChart(divid,sql1,title_name,series_name1,series_name2){
  var  myChart = echarts.init(document.getElementById(divid));
  var arr1=[],arr2=[],arr3=[];//alert(sql);
  function arrTest(){
	$.ajax({
	  type:"post",
	  async:false,
	  url:"report/report_json.php",
	  data:{sql:sql1,flg:'2'},
	  dataType:"json",
	  success:function(result){
		if (result) {
		  for (var i = 0; i < result.length; i++) {
			  arr1.push(result[i].name);
			  arr2.push(result[i].age);
			  arr3.push(result[i].age1);
		  }
		}
	  },
		error : function(errorMsg) {
			alert("sorry，请求数据失败");
			myChart.hideLoading();
		}
	})
	return arr1,arr2,arr3;
  }
  arrTest();
  var  option = {
    title: {
        text: title_name
    },
		tooltip: {
			show: true
		},
		legend: {
		   data:['age']
		},
		xAxis : [
			{
				type : 'category',
				data : arr1
			}
		],
		yAxis : [
			{
				type : 'value'
			}
		],
		series : [
			{
				"name":series_name1,
				"type":"bar",
				"data":arr2
			},
			{
				"name":series_name2,
				"type":"bar",
				"data":arr3
			}
		]
	};
	// 为echarts对象加载数据
	myChart.setOption(option);
}
