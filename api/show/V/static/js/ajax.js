$(document).ready(function(){
	getRandList();


	/* 获取随机内容 */
	function getRandList(){
		$.getJSON("ajax/getrandlist",function(result){
			var html='';
			$.each(result, function(i, item){
				html+='<a href="article/'+item.article_id+'">'+
							'<li>'+
								'<span class="design-name">'+item.article_title+'</span>'+
								'<span class="designer-name">'+
									item.article_createtimeymd+
									' by '+
									item.article_username+
								'</span>'+
							'</li>'+
						'</a>';
			});
			$("#randList ul").append(html);
	   });
	}

});
	
