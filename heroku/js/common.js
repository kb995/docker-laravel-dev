$(function(){$(".show_menu").on("click",function(){scroll_position=$(window).scrollTop(),$("body").addClass("fixed").css({top:-scroll_position}),$(".modal").fadeIn(),$(".slide_menu").addClass("open")}),$(".show_search").on("click",function(){$(this).hide(),"none"!=$(".show_prof").css("display")&&$("header h1").hide(),$(".search").show(),$(".close_search").show()}),$(".close_search").on("click",function(){$(".show_search").show(),$("header h1").show(),$(".search").hide(),$(this).hide()}),$("#js_show_msg").text().replace(/^[\s　]+|[\s　]+$/g,"").length&&($("#js_show_msg").slideToggle("slow"),setTimeout(function(){$("#js_show_msg").slideToggle("slow")},2e3))});