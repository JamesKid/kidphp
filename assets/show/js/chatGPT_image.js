

$(document).ready(function(){
    $('.chatGPT_button').on('click',function() { 
        getChatGPT();
    });
    // 监听按钮事件，获取结果 
    function getChatGPT(){
        search = $("#search").val();
        if(search == '') { 
            $("#divID").show();
            $("#divID").html('闻西: 请描述您要生成的图片...');
        }else { 
            $("#divID").show();
            $("#divID").html('闻西收到，正在思考中,请稍后...');
            $('.chatGPT_button').hide();
            $('.chatGPT_button_loading').show();
            $("#imageUrl").hide();
            $("#imageUrl").attr("src", "");
            $.ajax({
                type: "GET",
                contentType: "text/html",
                url:"/ajaxa/getChatGPTImage",
                data:"search="+search,
                dataType:"json",
                success:function(result){
                    if(result.hasOwnProperty('error')== true) { 
                        $("#divID").html('chatGPT 闻西崩了，不是vimkid问题，是闻西问题，请重试...');
                        $('.chatGPT_button_loading').hide();
                        $('.chatGPT_button').show();
                        $('#imageUrl').hide();
                    }
                    url = result.data[0].url;
                    $("#imageUrl").attr("src", url);
                    $("#divID").hide();
                    $('#imageUrl').show();
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
