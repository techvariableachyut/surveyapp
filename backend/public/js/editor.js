var surveyName = "";
function setSurveyName(name) {
  var $titleTitle = jQuery("#sjs_editor_title_show");
  $titleTitle.find("span:first-child").text(name);
}
function startEdit() {
  var $titleEditor = jQuery("#sjs_editor_title_edit");
  var $titleTitle = jQuery("#sjs_editor_title_show");
  $titleTitle.hide();
  $titleEditor.show();
  $titleEditor.find("input")[0].value = surveyName;
  $titleEditor.find("input").focus();
}
function cancelEdit() {
  var $titleEditor = jQuery("#sjs_editor_title_edit");
  var $titleTitle = jQuery("#sjs_editor_title_show");
  $titleEditor.hide();
  $titleTitle.show();
}
function postEdit() {
  cancelEdit();
  var oldName = surveyName;
  var $titleEditor = jQuery("#sjs_editor_title_edit");
  surveyName = $titleEditor.find("input")[0].value;
  setSurveyName(surveyName);
    // jQuery
    //   .get("/changeSurveyName?id=" + surveyId + "&name=" + surveyName, function(data) {
    //     surveyId = data.Id;
    //   })
    //   .fail(function(error) {
    //     surveyName = oldName;
    //     setSurveyName(surveyName);
    //     alert(JSON.stringify(error));
    //   });
    // $.post("/changeSurveyName?id=" + surveyId[3] + "&name=" + surveyName, function( data ) {
    //   $( ".result" ).html( data );
    // });

    $.post( "/changeSurveyName", 
      { 
        _token:__token__,
        surveyId: surveyId[3], 
        name: surveyName 
      })
    .done(function( data ) {
      setSurveyName(surveyName);
      // alert( "Data Loaded: " + data );
    });

}

function getParams() {
  var url = window.location.href
    .slice(window.location.href.indexOf("?") + 1)
    .split("&");
  var result = {};
  url.forEach(function(item) {
    var param = item.split("=");
    result[param[0]] = param[1];
  });
  return result;
}

Survey.dxSurveyService.serviceUrl = "";
var surveyId = window.location.pathname.split('/');
var editor = new SurveyEditor.SurveyEditor("editor");
var surveyName  = '';
if(decodeURI(surveyId[4]) == 'undefined'){
  surveyName  = "Set the Survey Title!"
}else{
  surveyName  = decodeURI(surveyId[4]);
}

editor.loadSurvey(surveyId[3]);
editor.saveSurveyFunc = function(saveNo, callback) {
  // if(jQuery("#sjs_editor_title_edit").find("input")[0].value == '' && surveyName == ''){
  //   alert('Set the Survey Title!')
  // }
  var xhr = new XMLHttpRequest();
  xhr.open(
    "POST",
    Survey.dxSurveyService.serviceUrl + "/changeJson?surveyId="+surveyId[3]
  );
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.onload = function() {
    var result = xhr.response ? JSON.parse(xhr.response) : null;
    if (xhr.status === 200) {
      callback(saveNo, true);
    }
  };
  xhr.send(
    JSON.stringify({
      _token:__token__, 
      surveyId: surveyId[3], Json: editor.text, 
      Text: editor.text, 
      surveyName: JSON.parse(editor.text).title ? JSON.parse(editor.text).title :  jQuery("#sjs_editor_title_edit").find("input")[0].value })
  );
};
editor.isAutoSave = true;
editor.showState = true;
editor.showOptions = true;

setSurveyName(surveyName);
