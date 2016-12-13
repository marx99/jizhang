<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
    <script src="js/echarts.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:400px"></div>
    <script type="text/javascript">
              var  myChart = echarts.init(document.getElementById('main'));
              var option = {
                    tooltip: {
                        show: true
                    },
                    legend: {
                       data:['age']
                    },
                    xAxis : [
                        {
                            type : 'category',
                            data : (function(){
								var arr=[];
									$.ajax({
									type : "post",
									async : false, //同步执行
									url : "list_echarts.php",
									data : {},
									dataType : "json", //返回数据形式为json
									success : function(result) {
									if (result) {
										  console.log(result);
										   for(var i=0;i<result.length;i++){
											  console.log(result[i].name);
											  arr.push(result[i].name);
											}
                                        }

                                    },
                                    error : function(errorMsg) {
                                        alert("sorry，请求数据失败");
                                        myChart.hideLoading();
                                    }
                                   })
                                   return arr;
                                })()
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
                            "data":(function(){
                                        var arr=[];
                                        $.ajax({
                                        type : "post",
                                        async : false, //同步执行
                                        url : "list_echarts.php",
                                        data : {},
                                        dataType : "json", //返回数据形式为json
                                        success : function(result) {
                                        if (result) {
                                               for(var i=0;i<result.length;i++){
                                                  console.log(result[i].age);
                                                  arr.push(result[i].age);
                                                }
                                        }
                                    },
                                    error : function(errorMsg) {
                                        alert("sorry，请求数据失败");
                                        myChart.hideLoading();
                                    }
                                   })
                                  return arr;
                            })()

                        }
                    ]
                };
                // 为echarts对象加载数据
                myChart.setOption(option);
            // }
    </script>
</body>