// JavaScript Document
var test = {
	newtest : function(){
		var typeId = jQuery("#selectType option:selected").val();
//		alert(typeId)
		if(typeId=="1"){
//			alert(typeId)
			var title=document.getElementById('textcontent').value;
			var optA=document.getElementById('opta').value;
			var optB=document.getElementById('optb').value;
			var optC=document.getElementById('optc').value;
			var optD=document.getElementById('optd').value;
			var ans=$("input[name='choice']:checked").val();
//			alert(ans)
//			alert(optA);
			}
		$.ajax({
			type: 'POST',
			url : '../lib/test_add.php',
			data: {"type":typeId, "title":title, "optA":optA, "optB":optB, "optC":optC, "optD":optD, "answer":ans} ,
			success: function(data){
				alert(data);
//			document.getElementById("myDiv").innerHTML=data;
//			$("#myDiv").slideDown(1000, function(){
//				$("#myDiv").fadeOut(5000);
//			});
			}
		});
	}
	
	}