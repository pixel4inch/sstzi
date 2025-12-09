
function submitLogin(enteredUsername, enteredPassword) {

  $.post('login.php', {username: enteredUsername, password:enteredPassword},   
  function(response) {
      if (response.result == true) {
         // success code here
      } else {
         // fail code here
      }
  }, 'json');
}