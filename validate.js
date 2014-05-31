function validate() {
  var ecsid = document.getElementById('input-ecsid');
  var localpart = document.getElementById('input-localpart');
  var submit = document.getElementById('input-submit');
  var isEcsIdValid, isLocalpartValid;

  if (ecsid.value.match(/^a0[0-9]{6}$/)) {
    ecsid.style.backgroundColor = '#cfc';
    ecsid.style.borderColor = '#8f8';
    ecsid.style.color = '#666';
    isEcsIdValid = true;
  } else {
    if (ecsid.value === '') {
      ecsid.style.backgroundColor = '#fff';
      ecsid.style.borderColor = '#ddd';
      ecsid.style.color = '#666';
    } else {
      ecsid.style.backgroundColor = '#fcc';
      ecsid.style.borderColor = '#f88';
      ecsid.style.color = '#d00';
    }
    isEcsIdValid = false;
  }

  if (localpart.value.match(/^[a-z]+\.[a-z]+\.[a-z0-9]{3}$/)) {
    localpart.style.backgroundColor = '#cfc';
    localpart.style.borderColor = '#8f8';
    localpart.style.color = '#666';
    isLocalpartValid = true;
  } else {
    if (localpart.value === '') {
      localpart.style.backgroundColor = '#fff';
      localpart.style.borderColor = '#ddd';
      localpart.style.color = '#666';
    } else {
      localpart.style.backgroundColor = '#fcc';
      localpart.style.borderColor = '#f88';
      localpart.style.color = '#d00';
    }
    isLocalpartValid = false;
  }

  if ((isEcsIdValid && isLocalpartValid) && submit.attributes.disabled) {
    submit.removeAttribute('disabled');
  } else {
    submit.attributes.disabled = 'disabled';
  }
}
