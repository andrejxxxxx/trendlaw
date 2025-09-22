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

      form.addEventListener('submit', function (event) {
         event.preventDefault();

         // Get UI element
         const errorMessages = form.querySelectorAll('.cf-error-message');
         const phoneInput = form.querySelector('#phone');
         const phoneError = form.querySelector('#cf-phone-error');
         const sendButton = form.querySelector('.cf-button');

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
         formData.append('phone', number);

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

               console.log(data);
               
               form.reset(); // Clear the form

               if( !data.silent ) {
                 // Track FB Lead
                 fbq('track', 'Lead'); 
               }

               // Replace content for page
               const grata_content = document.querySelector('.page-content-wrapper');

               if (grata_content) {

                  // Insert custom HTML
                  grata_content.innerHTML = `
                     <section class="page-section section-thanks">
                        <div class="wrapper">
                           <h1 class="data-title">
                              Спасибо, ваша заявка успешно отправлена
                           </h1>
                           <div class="data-subtitle">
                              Наш менеджер свяжется с вами в ближайшее время
                           </div>
                        </div>
                     </section>
                  `;

               }else {

                  // Redirected to the thank-you page
                  alert('Спасибо, ваша заявка успешно отправлена');

               }

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
            
      });
   });



});