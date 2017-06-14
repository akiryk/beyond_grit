jQuery('#submit').click(function(e){
  var data_2;
  jQuery.ajax({
    type: 'POST',
    url: 'http://localhost:8888/research2action/wp-content/themes/beyond_grit/google_captcha.php',
    data: jQuery('#commentform').serialize(),
    async:false,
    success: function(data) {
      if(data.nocaptcha==='true') {
        data_2=1;
      } else if(data.spam==='true') {
        data_2=1;
      } else {
        data_2=0;
      }
    }
  });

  if(data_2!=0) {
    // reCaptcha has a problem
    e.preventDefault();

    var alertDiv,
        alertText;

    if(data_2==1) {
      alertText = 'Sorry, but we need to confirm you are a real person! Please check the box below.';
    } else {
      alertText = 'Unfortunately, Google thinks this comment is spam. Try clicking the anti-spam box again.'
    }

    if (!!document.getElementById('comment-alert-message')) { 
      // we already have an alert on the page
      alertDiv = document.querySelector('.error-message')
    } else {
      var captcha = document.querySelector('.g-recaptcha');
      captcha.classList.add('error-wrapper');
      captcha.setAttribute('id', 'comment-alert-message');
      var captchaChild = captcha.querySelector('div');
      alertDiv = document.createElement("div");
      var newContent = document.createTextNode(""); 
      alertDiv.appendChild(newContent);
      alertDiv.classList.add('error-message');
      captcha.insertBefore(alertDiv, captchaChild);
    }

    alertDiv.firstChild.nodeValue = alertText;
    
  } else {
      jQuery("#commentform").submit
  }
});