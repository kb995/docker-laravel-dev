$(function(){var r,e,a,t=new RegExp(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/);function s(s){switch(s){case"name":$(".flash_cursor").css({top:"5px"});break;case"email":$(".flash_cursor").css({top:"105px"});break;case"password":$(".flash_cursor").css({top:"205px"});break;case"js_btn":$(".flash_cursor").css({top:"275px"})}}function o(s){input_name=$(s).val(),error_message=$(s+"+ span"),r=""===input_name?($(s).addClass("error"),$(error_message).text("名前を入力してください"),0):8<input_name.length?($(s).addClass("error"),$(error_message).text("名前が長すぎます"),0):($(s).removeClass("error"),$(error_message).text(""),1)}function n(s){input_email=$(s).val(),error_message=$(s+"+ span"),e=""===input_email?($(s).addClass("error"),$(error_message).text("メールアドレスを入力してください"),0):t.test(input_email)?($(s).removeClass("error"),$(error_message).text(""),1):($(s).addClass("error"),$(error_message).text("メールアドレスが異常です"),0)}function i(s){input_pass=$(s).val(),error_message=$(s+"+ span"),a=""===input_pass?($(s).addClass("error"),$(error_message).text("パスワードを入力してください"),0):input_pass.length<6?($(s).addClass("error"),$(error_message).text("パスワードが短すぎます"),0):($(s).removeClass("error"),$(error_message).text(""),1)}function p(){r&&e&&a?($("#js_btn").prop("disabled",!1),s("js_btn")):($("#js_btn").prop("disabled",!0),s($(":focus").attr("id")))}$(".flash_cursor").css({top:"5px"}),$(window).on("load",function(){$("#name").val()&&$("#email").val()&&$("#password").val()&&(o("#"+$("#name").attr("id")),n("#"+$("#email").attr("id")),i("#"+$("#password").attr("id")),p())}),$("input").on("focusin",function(){s($(this).attr("id"))}),$("input").on("input",function(){var s="#"+$(this).attr("id");switch(s){case"#name":o(s);break;case"#email":n(s);break;case"#password":i(s)}p()})});