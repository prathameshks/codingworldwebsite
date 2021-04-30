
function check() {
    if ((document.getElementById('passnewc').value).length > 15) {
    document.getElementById('submit').disabled = true;
    document.getElementById('matchmessage').style.color = 'red';
    document.getElementById('matchmessage').innerHTML = '❌';
    document.getElementById('passnewcdiv').setAttribute('tooltip-title', "Password should not be greater than 15 characters");
    var gc = false;
  }else if ((document.getElementById('passnewc').value).length < 8) {
    document.getElementById('submit').disabled = true;
    document.getElementById('matchmessage').style.color = 'red';
    document.getElementById('matchmessage').innerHTML = '❌';
    document.getElementById('passnewcdiv').setAttribute('tooltip-title', "Password should not be less than 8 characters");
    var lc = false;
  }else if ((document.getElementById('passnewc').value == document.getElementById('passnew').value)) {
      document.getElementById('submit').disabled = false;
      document.getElementById('matchmessage').style.color = 'green';
      document.getElementById('matchmessage').innerHTML = '✔';
      document.getElementById('passnewcdiv').removeAttribute('tooltip-title');
    } else {
      document.getElementById('submit').disabled = true;
      document.getElementById('matchmessage').style.color = 'red';
      document.getElementById('matchmessage').innerHTML = '❌';
      document.getElementById('passnewcdiv').setAttribute('tooltip-title', "Password didn't match");
    }
  };
  
  function checkpass(password,tooltip,div) {
    if ((document.getElementById(password).value).length < 8) {
      document.getElementById('submit').disabled = true;
      document.getElementById(tooltip).style.color = 'red';
      document.getElementById(tooltip).innerHTML = '❌';
      document.getElementById(div).setAttribute('tooltip-title', "Password should not be less than 8 characters");
    } else if ((document.getElementById(password).value).length > 15) {
      document.getElementById('submit').disabled = true;
      document.getElementById(tooltip).style.color = 'red';
      document.getElementById(tooltip).innerHTML = '❌';
      document.getElementById(div).setAttribute('tooltip-title', "Password should not be greater than 15 characters");
    } else {
      document.getElementById('submit').disabled = true;
      document.getElementById(tooltip).style.color = 'green';
      document.getElementById(tooltip).innerHTML = '✔';
      document.getElementById(div).removeAttribute('tooltip-title');
    }
  };
  
  function hide(obj){
  
    var el = document.getElementById(obj);
  
    el.remove();
  
  }