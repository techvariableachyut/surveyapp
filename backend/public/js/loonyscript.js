function hide() {
  for (var i = 0, j = arguments.length; i < j; i++){
    $("#" + arguments[i]).hide();
  }
  for (var i = 0, j = arguments.length; i < j; i++){
    $("." + arguments[i]).hide();
  }
}

function empty() {
  for (var i = 0, j = arguments.length; i < j; i++){
    $("#" + arguments[i]).empty();
  }
  for (var i = 0, j = arguments.length; i < j; i++){
    $("." + arguments[i]).empty();
  }
}


function show() {
  for (var i = 0, j = arguments.length; i < j; i++){
    $("#" + arguments[i]).show();
  }
  for (var i = 0, j = arguments.length; i < j; i++){
    $("." + arguments[i]).show();
  }
}

$(".alert").delay(5000).slideUp(1000,function(){
	$(this).alert(close);
});

function showProgress(btn){
  $("." + btn + " > span").hide();
  $("." + btn + " > img").attr('style', 'width:10px; height:10px;'); 
}

function progress(btn){
  $("#" + btn + " > img").show(); 
}
function hideprogress(btn){
  $("#" + btn + " > img").hide(); 
}

function successStory(input_, submitBtn, modal, body, text){
  $("." + input_).text(text); 
  $("." + submitBtn + " > span").show().text("Updated");
  $("." + submitBtn + " > img").attr('style', 'display:none;');
  $("." + modal).delay(1000).fadeOut();
  setTimeout(function(){
  	$("." + submitBtn + " > span").text("Submit");
  	$("." + body).html(text);
	}, 2000);
}

function doubleSuccessStory(submitBtn, modal, body, text , heading, headtext){ 
  $("." + submitBtn + " > span").show().text("Updated");
  $("." + submitBtn + " > img").attr('style', 'display:none;');
  $("." + modal).delay(1000).fadeOut();
  setTimeout(function(){
  	$("." + submitBtn + " > span").text("Submit");
  	$("." + body).html(text);
  	$("." + heading).html(headtext);
	}, 2000);
}

function deleteStory(deleteBtn, modal, container){
  $("." + deleteBtn + " > span").show().text("Deleted");
  $("." + deleteBtn + " > img").attr('style', 'display:none;');
  $("#" + modal).delay(1000).fadeOut();
  $("." + modal).delay(1000).fadeOut();
  setTimeout(function(){
  	$("." + container).remove();
	}, 2000);
}

function remove(){
  for (var i = 0, j = arguments.length; i < j; i++){
    $("." + arguments[i]).remove();
  }

  for (var i = 0, j = arguments.length; i < j; i++){
    $("#" + arguments[i]).remove();
  }
}

function append(classtag,content){
  $("." + classtag).append(content);
}

function loader(container){
  $("#" + container).append("<img id='loader' src='/images/svg/facebook.svg' style='margin-left:2em;width:25px; height:25px;'>");
}

function removeLoader(container){
  $("#" + container + "> #loader").remove();
}

var find = [ "#red","#green","#blue","#gray","#darkgray","#white","#purple","#indigo",
            "#orange","#yellow","#teal","#cyan","red#","green#","blue#","gray#","darkgray#",
            "white#","purple#","indigo#","orange#","yellow#","teal#","cyan#","#fontxs",
            "#fontsm","#fontm","#fontl","#fontxl","#italic","fontxs#","fontsm#","fontm#","fontl#","fontxl#","italic#","\n"];

var replace = [
    "<div style='background:#dc3545; color:white; padding:8px; font-size:14px; border-radius:3px; margin:2px 0px;'>",
    "<div style='background:#28a745; color:white; padding:8px; font-size:14px; border-radius:3px; margin:2px 0px;'>",
    "<div style='background:#007bff; color:white; padding:8px; font-size:14px; border-radius:3px; margin:2px 0px;'>",
    "<div style='background:#868e96; color:white; padding:8px; font-size:14px; border-radius:3px; margin:2px 0px;'>",
    "<div style='background:#343a40; color:white; padding:8px; font-size:14px; border-radius:3px; margin:2px 0px;'>",
    "<div style='background:#ffffff; color:white; padding:8px; font-size:14px; border-radius:3px; margin:2px 0px;'>",
    "<div style='background:#6f42c1; color:white; padding:8px; font-size:14px; border-radius:3px; margin:2px 0px;'>",
    "<div style='background:#6610f2; color:white; padding:8px; font-size:14px; border-radius:3px; margin:2px 0px;'>",
    "<div style='background:#fd7e14; color:white; padding:8px; font-size:14px; border-radius:3px; margin:2px 0px;'>",
    "<div style='background:#ffc107; color:white; padding:8px; font-size:14px; border-radius:3px; margin:2px 0px;'>",
    "<div style='background:#20c997; color:white; padding:8px; font-size:14px; border-radius:3px; margin:2px 0px;'>",
    "<div style='background:#17a2b8; color:white; padding:8px; font-size:14px; border-radius:3px; margin:2px 0px;'>",
    "</div>","</div>","</div>","</div>","</div>","</div>","</div>","</div>","</div>","</div>","</div>","</div>",
    "<span style='font-size:10px; font-family:fntmd'>","<span style='font-size:14px; font-family:fntmd'>",
    "<span style='font-size:24px; font-family:fntmd'>","<span style='font-size:32px; font-family:fntmd'>",
    "<span style='font-size:46px; font-family:fntmd'>","<span style='font-size:16px; font-family:italic'>",
    "</span>","</span>","</span>","</span>","</span>","</span>","</br>" ];

String.prototype.replaceArray = function(find, replace) {
    var replaceString = this;
    var regex; 
    for (var i = 0; i < find.length; i++) {
        regex = new RegExp(find[i], "g");
        replaceString = replaceString.replace(regex, replace[i]);
    }
    return replaceString;
};

function check(msg){
    return msg.replaceArray(find, replace);
}
