document.addEventListener('DOMContentLoaded', () => {
   /*
   * Opening a header mobile menu
   */
   const menuBurger = document.querySelector('.js-button-menu');
   const menuMobileWrapper = document.querySelector('.js-mobile-menu');
   const menuListItems = document.querySelectorAll('.header-menu a')
   const htmlBody = document.getElementsByTagName('body')[0];

   menuBurger.addEventListener('click', function () {
      menuBurger.classList.toggle('active');
      menuMobileWrapper.classList.toggle('active');
      htmlBody.classList.toggle('overflow-hidden');
   });

   menuListItems.forEach(item => {
      item.addEventListener('click', function () {
         menuBurger.classList.remove('active');
         menuMobileWrapper.classList.remove('active');
         htmlBody.classList.remove('overflow-hidden');
      });
   });
});
