function deleteSurvey(token){
  var conf = confirm('Are you sure?')
  conf ? window.location.replace('/survey/delete/'+token) : false
}

function deleteSurveyResponse(token){
    var conf = confirm('Are you sure?')
    conf ? window.location.replace('/survey/response/delete/'+token) : false
  }


function copy(token,id,csrfToken){
  $.ajax({
      type: 'POST', 
      url: "/survey/copy/" + token + "",
      data:{_token:csrfToken}
  })   
  .done(function(msg){
      var index = $("#indexid").text();
      token = csrfToken;
      $("#append").append(
          `<tr> \
              <td class='text-truncate'> 
                  <a href='#'>${$('#append').children().length + 1}</a> 
              </td> 
              <td class='text-truncate'>${msg['new']['title']}</td> 
              <td class='text-truncate'>  
                  <a href='/create/questions/${msg['new']['token']}' class='btn btn-sm btn-warning'>Edit</a> 
                  <a href='#' onclick='deleteSurvey(${msg['new']['token']})' class='btn btn-sm btn-danger'>Delete</a> 
                  <a href='#' onclick='event.preventDefault(); copy(${msg['new']['token']},${token})' class='btn btn-sm btn-success'>Make a Copy</a>  
                  <a href='/answers/csv/all/${msg['new']['token']}' class='btn btn-sm btn-default'>Download</a>
              </td> 
              <td> 
                <a target='_blank' href='/monitoring-tool/${msg['new']['token']}' class='btn btn-sm btn-success'>
                    <i class="icon-android-share-alt"></i>
                </a> 
              </td> 
              <td>
                    <a href="/survey/answer/${msg['new']['token']}" class="btn btn-sm btn-default">Responses</a>
              </td>
          </tr>`
      );
  })
}