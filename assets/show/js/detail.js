$(document).ready(function(){
    getVisit(); // 获取访问量
    function getVisit(){
        articleId = $("#articleId").val();
        $.ajax({
            type: "GET",
            contentType: "text/html",
            url:"/ajaxa/getVisited",
            data:"articleId="+articleId,
            dataType:"json",
            success:function(result){
                $("#visited").html(result);
            }
        });
    }
});

