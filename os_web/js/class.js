//信息

//$("#bt_appr").click(function(){
//	$(this).fadeOut();
//	var temp = '';
//	var msg = 'approve';
//	var chenked=$("input[type='checkbox']:checked").val([]);//获取checked值(多选)
//	for(var i=0;i<chenked.length;i++){
//		temp +=chenked[i].value+',';
//	}
//	$.ajax({
//		type: 'POST',
//		url : 'lib/usr_appr.php',
//		data: {"msgId":temp, "message":msg} ,
//		success: function(data){
//			document.getElementById("myDiv").innerHTML=data;
//			$("#myDiv").slideDown(1000, function(){
//				$("#myDiv").fadeOut(6000);
//				});
//		}
//	});
//});
var class = {
	
	//通过审核
	remove : function(){
			var temp = '';
			var msg = 'approve';
			var chenked=$("input[type='checkbox']:checked").val([]);//获取checked值(多选)
			
			for(var i=0;i<chenked.length;i++){
		    	temp +=chenked[i].value+',';
	        }
			$.ajax({
				type: 'POST',
				url : 'lib/usr_appr.php',
				data: {"msgId":temp, "message":msg} ,
				success: function(data){
					
					document.getElementById("myDiv").innerHTML=data;
					$("#myDiv").slideDown(1000, function(){
						$("#myDiv").fadeOut(5000);
						});
				}
	        });
	}
	
	
}
