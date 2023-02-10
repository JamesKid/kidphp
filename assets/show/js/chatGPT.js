
$(document).ready(function(){
    $('.chatGPT_button').on('click',function() { 
        getChatGPT();
    });
    // 监听按钮事件，获取结果 
    function getChatGPT(){
        search = $("#search").val();
        if(search == '') { 
            $("#divID").html('闻西: 请输入您想问的问题...');
        }else { 
            $("#divID").html('闻西收到，正在思考中,请稍后...');
            $('.chatGPT_button').hide();
            $('.chatGPT_button_loading').show();
            $.ajax({
                type: "GET",
                contentType: "text/html",
                url:"/ajaxa/getChatGPT",
                data:"search="+search,
                dataType:"json",
                success:function(result){
                    // show = JSON.parse(result).choices[0].text;
                    if(result.hasOwnProperty('error')== true) { 
                        $("#divID").html('chatGPT 闻西崩了，不是vimkid问题，是闻西问题，请重试...');
                        $('.chatGPT_button_loading').hide();
                        $('.chatGPT_button').show();
                    }
                    show = result.choices[0].text;
                    show = show.replace(/\n/g, "<br />");
                    show = show.replace(/\t/g, "&nbsp");
                    // show = show.replace(/\s/g, "&nbsp");
                    $("#divID").html(search + show);
                    $('.chatGPT_button_loading').hide();
                    $('.chatGPT_button').show();
                },
                error:function (error) {
                    $("#divID").html('chatGPT 闻西崩了，不是vimkid问题，请稍后再试试...');
                    $('.chatGPT_button_loading').hide();
                    $('.chatGPT_button').show();

                }
            });
        }
    }
});
