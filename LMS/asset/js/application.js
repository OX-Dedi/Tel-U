function set_language(e){var s=$("#site_url").val();$.ajax({url:s+"app_user/set_language",type:"GET",data:"language="+e,success:function(e){location.reload()},error:function(e,s){alert(e.responseText),alert("Server side error occured.")}})}function save_subscription(){$("#subscription_message").text("");var e=$("#subscription_mail").val();if(""==e)return $("#subscription_mail").focus(),void $("#subscription_message").text("Please enter email address");$("#subscription_loader").show();var s=$("#site_url").val();$.ajax({url:s+"app_user/save_subscription",type:"GET",data:"email="+e,success:function(e){"false"==(e=jQuery.parseJSON(e)).is_error&&$("#subscription_message").removeClass("error").addClass("success"),$("#subscription_message").text(e.message),$("#subscription_loader").hide()},error:function(e,s){alert(e.responseText),$("#subscription_loader").hide()}})}function clear_form_values(e){$(":input",e).each(function(){var e=this.type,s=this.tagName.toLowerCase();"text"==e||"password"==e||"hidden"==e||"textarea"==s||"number"==e||"email"==e||"file"==e?this.value="":"checkbox"==e||"radio"==e?this.checked=!1:"select"==s&&(this.selectedIndex=0),$("#message").text("")})}function validateEmail(e){return/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(e)}function isNumberKey(e){var s=e.which?e.which:e.keyCode;return!(46!=s&&37!=s&&39!=s&&31<s&&(s<48||57<s))}$(document).ready(function(){$(window).scroll(function(){100<$(this).scrollTop()?$("#scroll").fadeIn():$("#scroll").fadeOut()}),$("#scroll").click(function(){return $("html, body").animate({scrollTop:0},1e3),!1}),$("#sidebar").mCustomScrollbar({theme:"minimal"}),$("#dismiss, .overlay").on("click",function(){$("#sidebar").removeClass("active"),$(".overlay").fadeOut()}),$(".btn-menu").on("click",function(){$("#sidebar").addClass("active"),$(".overlay").fadeIn(),$(".collapse.in").toggleClass("in"),$("a[aria-expanded=true]").attr("aria-expanded","false")})});