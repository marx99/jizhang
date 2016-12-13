  var  myChart = echarts.init(document.getElementById('main_charts'));
  var arr1=[],arr2=[];
  function arrTest(){
	$.ajax({
	  type:"post",
	  async:false,
	  url:"list_echarts.php",
	  data:{},
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
				"name":"age",
				"type":"bar",
				"data":arr2
			}
		]
	};
	// 为echarts对象加载数据
	myChart.setOption(option);
// }
