document.getElementById('openPopupButton').addEventListener('click', function() {
    document.getElementById('popupForm').style.display = 'block';
  });
  
  document.getElementsByClassName('close')[0].addEventListener('click', function() {
    document.getElementById('popupForm').style.display = 'none';
  });
  
  document.getElementById('subscriptionForm').addEventListener('submit', function(event) {
    event.preventDefault();
  
    // Perform form submission logic here
    // For example, you can send the form data to a server using AJAX
  
    // After form submission, close the pop-up form
    document.getElementById('popupForm').style.display = 'none';
  });