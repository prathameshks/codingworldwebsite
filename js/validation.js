
function check() {
  if ((document.getElementById('password').value).length > 15) {
  document.getElementById('submit').disabled = true;
  document.getElementById('validmessage').style.color = 'red';
  document.getElementById('validmessage').innerHTML = '❌';
  document.getElementById('passdiv').setAttribute('tooltip-title', "Password should not be greater than 15 characters");
  var gc = false;
}else if ((document.getElementById('password').value).length < 8) {
  document.getElementById('submit').disabled = true;
  document.getElementById('validmessage').style.color = 'red';
  document.getElementById('validmessage').innerHTML = '❌';
  document.getElementById('passdiv').setAttribute('tooltip-title', "Password should not be less than 8 characters");
  var lc = false;
}else if ((document.getElementById('password').value == document.getElementById('confirm_password').value)) {
    document.getElementById('submit').disabled = false;
    document.getElementById('matchmessage').style.color = 'green';
    document.getElementById('matchmessage').innerHTML = '✔';
    document.getElementById('cpassdiv').removeAttribute('tooltip-title');
  } else {
    document.getElementById('submit').disabled = true;
    document.getElementById('matchmessage').style.color = 'red';
    document.getElementById('matchmessage').innerHTML = '❌';
    document.getElementById('cpassdiv').setAttribute('tooltip-title', "Password didn't match");
  }
};

function checkpass() {
  if ((document.getElementById('password').value).length < 8) {
    document.getElementById('submit').disabled = true;
    document.getElementById('validmessage').style.color = 'red';
    document.getElementById('validmessage').innerHTML = '❌';
    document.getElementById('passdiv').setAttribute('tooltip-title', "Password should not be less than 8 characters");
  } else if ((document.getElementById('password').value).length > 15) {
    document.getElementById('submit').disabled = true;
    document.getElementById('validmessage').style.color = 'red';
    document.getElementById('validmessage').innerHTML = '❌';
    document.getElementById('passdiv').setAttribute('tooltip-title', "Password should not be greater than 15 characters");
  } else {
    document.getElementById('submit').disabled = true;
    document.getElementById('validmessage').style.color = 'green';
    document.getElementById('validmessage').innerHTML = '✔';
    document.getElementById('passdiv').removeAttribute('tooltip-title');
  }
};

function hide(obj){

  var el = document.getElementById(obj);

  el.remove();

}