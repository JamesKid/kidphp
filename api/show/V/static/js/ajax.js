$(document).ready(function(){
	getRandList();
	/* 获取随机内容 */
	function getRandList(){
	   $.getJSON("ajax/getrandlist",function(result){
		   alert('abc');
		   /*
		  $.each(result, function(i, field){
			$("div").append(field + " ");
		  });
		  */
	   });
	}

});
	
