$(document).ready(function(){
    getVisit(); // 获取访问量
    function getVisit(){
        $.getJSON("/ajax/getVisit",function(result){
             $("#visited").html(15);
        });
    }
});

