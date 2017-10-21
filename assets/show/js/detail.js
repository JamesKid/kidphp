$(document).ready(function(){
    getVisit(); // 获取访问量
    function getVisit(){
        $.ajax({
            type: "GET",
            contentType: "text/html",
            url:"/ajax/getVisit",
            dataType:"json",
            success:function(result){
                console.log(result);
            //$("#div1").html(result);
            }
        });
    }
});

