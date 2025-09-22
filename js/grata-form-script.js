document.addEventListener('DOMContentLoaded', function () {

   const forms = document.querySelectorAll('.classic-form');

   // Function to get parameter value from URL
   function getQueryParameter(name) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(name);
   }

   forms.forEach(function (form) {
      const messageBlock = form.querySelector('.cf-form-message');
      const inputNumber = form.querySelector("#phone");

      //Phone number mask
      let iti;

      // Get country_code value from URL
      const country_code = getQueryParameter('country_code');

      // Set the value of initialCountry
      const initialCountry = country_code || 'kz'; // If country_code is empty or missing, use 'kz'

      if (inputNumber) {
         iti = window.intlTelInput(inputNumber, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.js",
            separateDialCode: true,
            nationalMode: true,
            initialCountry: initialCountry,
         });
      }

      inputNumber.addEventListener("input", function () {
         this.value = this.value.replace(/\D/g, ''); // Удаляем все, кроме цифр
      });

      /*form.addEventListener('submit', function (event) {
         event.preventDefault();

         // Get UI element
         const errorMessages = form.querySelectorAll('.grata-error-message');
         const phoneInput = form.querySelector('#user-phone');
         const phoneError = form.querySelector('#grata-phone-error');
         const sendButton = form.querySelector('.grata-button');

         messageBlock.classList.remove('show', 'error', 'success');

         // Clearing previous error messages
         errorMessages.forEach(el => el.textContent = '');

         const phoneValue = phoneInput.value.replace(/[ \-\(\)]/g, '');

         // Checking the length of the phone number
         if (phoneValue.length < 7) {
            event.preventDefault();
            phoneError.textContent = 'Номер телефона должен содержать минимум 7 цифр.';
            phoneError.classList.add('show', 'error');
            return;
         } 
         
         //Get full phone number
         const number = iti.getNumber();

         //Create Form Data
         const formData = new FormData(form);
         formData.append('user_phone', number);

         // Disable the send button
         sendButton.classList.add('disabled');

         fetch(form.action, {
            method: 'POST',
            body: formData
         })
            .then(response => response.json())
            .then(data => {

               // Enable the send button again
               sendButton.classList.remove('disabled');

               if (data.success) {

                  // console.log(data);
                  
                  // Redirected to the thank-you page
                  window.location.href = '/thank-you';

                  form.reset(); // Clear the form

               } else {
                  // Error handling
                  let hasErrors = false;
                  for (const [field, error] of Object.entries(data.errors)) {
                     const parentElement = form.querySelector(`#${field}`).closest('.data-block');
                     if (parentElement) {
                        const errorMessageElement = parentElement.querySelector('.grata-error-message');
                        if (errorMessageElement) {
                           errorMessageElement.textContent = error;
                           hasErrors = true;
                        }
                     }
                  }
                  if (hasErrors) {
                     messageBlock.textContent = '';
                  } else {
                     messageBlock.textContent = 'Форма не была отправлена. Попробуйте позже';
                     messageBlock.classList.add('show', 'error');
                  }
               }
            })
            .catch(error => {
               // Enable the send button again
               sendButton.classList.remove('disabled');

               messageBlock.textContent = 'Форма не была отправлена. Попробуйте позже';
               messageBlock.classList.add('show', 'error');
            });
      });*/
   });



});