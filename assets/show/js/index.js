$(document).ready(function(){
    setLanguage();
    function setLanguage(){
        $("#zh").click(function(){
            $.getJSON("/index/setLanguage?language=zh",function(result){
            });
        });
    }
});

