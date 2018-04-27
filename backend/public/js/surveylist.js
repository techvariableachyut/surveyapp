function deleteSurvey(token){
  var conf = confirm('Are you sure?')
  conf ? window.location.replace('/survey/delete/'+token) : false
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
                  <a href='#'>${index}</a> 
              </td> 
              <td class='text-truncate'>${msg['new']['title']}</td> 
              <td class='text-truncate'> 
                  <a href='/create/questions/${msg['new']['token']}' class='btn btn-sm btn-info'>View</a> 
                  <a href='/create/questions/${msg['new']['token']}' class='btn btn-sm btn-warning'>Edit</a> 
                  <a href='#' onclick='deleteSurvey(${msg['new']['token']})' class='btn btn-sm btn-danger'>Delete</a> 
                  <a href='/answers/csv/all/${msg['new']['token']}' class='btn btn-sm btn-default'>Download</a>
              </td> 
              <td> 
                  <a target='_blank' href='/monitoring-tool/${msg['new']['token']}' class='btn btn-sm btn-success'>Share survey link</a> 
              </td> 
              <td> 
                  <a href='#' onclick='event.preventDefault(); copy(${msg['new']['token']},${token})' class='btn btn-sm btn-success'>Duplicate Survey</a>  
              </td> 
          </tr>`
      );
  })
}