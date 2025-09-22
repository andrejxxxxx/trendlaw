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

            console.log(data);

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
                        <img class="shadow" src="/images/shadow.png">
                        <div class="title_block">
                           <div class="text-block">
                              <p class="head-text">СПАСИБО ЗА <br> ВАШУ ЗАЯВКУ!</p>
                              <p class="sub-text">Наш менеджер свяжется с Вами по указанным <br> контактным данным в ближайшее время!</p>
                           </div>
                           <div class="image-block">
                              <img src="/images/rocket.png">
                           </div>
                        </div>
                     </section>
                  `;

               }else {

                  // Redirected to the thank-you page
                  alert('Спасибо, ваша заявка успешно отправлена');

               }

            } else {

               console.log(data);

               // Error handling
               let hasErrors = false;
               for (const [field, error] of Object.entries(data.errors)) {
                  console.log(`#${field}`);
                  const parentElement = form.querySelector(`#${field}`).closest('.cf-row');
                  if (parentElement) {
                     const errorMessageElement = parentElement.querySelector('.cf-error-message');
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

            console.log(error);

            // Enable the send button again
            sendButton.classList.remove('disabled');

            messageBlock.textContent = 'Форма не была отправлена. Попробуйте позже';
            messageBlock.classList.add('show', 'error');
         });

      });
   });



   /*
   * HEADER
   */
   document.querySelector('.nav-menu-burger').addEventListener('click', function(event) {
       event.preventDefault();
       const body = document.querySelector('body');
       if (body.classList.contains('mobile-menu')) {
           body.classList.remove('mobile-menu');
       } else {
           body.classList.add('mobile-menu');
       }
   });


});