<?php
   $pxCookie = isset($_COOKIE['pxCookie']) ? $_COOKIE['pxCookie'] : '';
?>

<!DOCTYPE html>
<html lang="ru">

<head>

   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, user-scalable=no">
   <meta name="robots" content="noindex" />
   <title>Международная юридическая фирма Unicase</title>
   <link rel="icon" type="image/x-icon" href="favicon.png">
   <link rel="stylesheet" href="css/grata-style.min.css">

   <!-- Meta Pixel Code -->
   <script>
      !function (f, b, e, v, n, t, s) {
         if (f.fbq) return; n = f.fbq = function () {
            n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
         };
         if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
         n.queue = []; t = b.createElement(e); t.async = !0;
         t.src = v; s = b.getElementsByTagName(e)[0];
         s.parentNode.insertBefore(t, s)
      }(window, document, 'script',
         'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '<?php echo $pxCookie; ?>');
      fbq('track', 'PageView');
      fbq('track', 'Lead');
   </script>
   <noscript><img height="1" width="1" style="display:none"
         src="https://www.facebook.com/tr?id=<?php echo $pxCookie; ?>&ev=PageView&noscript=1" /></noscript>
   <!-- End Meta Pixel Code -->

   <!-- Microsoft Clarity -->
   <script type="text/javascript">
       (function(c,l,a,r,i,t,y){
           c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
           t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
           y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
       })(window, document, "clarity", "script", "r99x70yoh9");
   </script>

   <!-- Keitaro tracking script -->
   <script type='application/javascript'>
   if (!window.KTracking){window.KTracking={collectNonUniqueClicks: false, multiDomain: false, R_PATH: 'https://uzunicase.click/gQRYjQzX', P_PATH:'https://uzunicase.click/gQRYjQzX/postback', listeners: [], reportConversion: function(){this.queued = arguments;}, getSubId: function(fn) {this.listeners.push(fn);}, ready: function(fn) {this.listeners.push(fn);} };}(function(){var a=document.createElement('script');a.type='application/javascript';a.async=true;a.src='https://uzunicase.click/js/k.min.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(a,s)})();
   </script><noscript><img height='0' width='0' alt='' src='https://uzunicase.click/gQRYjQzX'/></noscript>
   
</head>


<body>

   <div class="grata-body-inner">

      <header class="grata-header" id="grata-header">
         <div class="grata-container">
            <div class="header-wrapper">
               <a href="/" class="header-logotype">
                  <img src="images/logotype.png" alt="Logotype">
               </a>
               <div class="header-right">
                  <nav class="header-menu">
                     <ul>
                        <li><a href="https://www.gov.kz/memleket/entities/knb/about">О комитете</a></li>
                        <li><a href="https://www.gov.kz/memleket/entities/knb/activities/directions">Деятельность</a>
                        </li>
                        <li><a href="https://www.gov.kz/memleket/entities/knb/documents/1">Документы</a></li>
                        <li><a href="https://www.gov.kz/memleket/entities/knb/press">Пресс-центр</a></li>
                        <li><a href="#grata-consult">Онлайн-приемная</a></li>
                     </ul>
                  </nav>
                  <button type="button" class="grata-button grata-button-menu js-button-menu" aria-label="Open menu">
                     <span></span>
                     <span></span>
                     <span></span>
                  </button>
               </div>
            </div>
         </div>

         <div class="mobile-menu js-mobile-menu">
            <div class="grata-container">
               <nav class="header-menu">
                  <ul>
                     <li><a href="https://www.gov.kz/memleket/entities/knb/about">О комитете</a></li>
                     <li><a href="https://www.gov.kz/memleket/entities/knb/activities/directions">Деятельность</a>
                     </li>
                     <li><a href="https://www.gov.kz/memleket/entities/knb/documents/1">Документы</a></li>
                     <li><a href="https://www.gov.kz/memleket/entities/knb/press">Пресс-центр</a></li>
                     <li><a href="#grata-consult">Онлайн-приемная</a></li>
                  </ul>
               </nav>
            </div>
         </div>
      </header>

      <main id="grata-page-content" class="grata-page-content">

         <section class="grata-section grata-thanks">
            <div class="grata-container">
               <div class="data-wrapper">
                  <h1 class="data-title">
                     Спасибо, ваша заявка успешно отправлена
                  </h1>
                  <div class="data-subtitle">
                     Наш менеджер свяжется с вами в ближайшее время
                  </div>
               </div>
            </div>
         </section>

      </main>

      <footer class="grata-footer" id="grata-footer">
         <div class="grata-container">
            <div class="footer-wrapper">
               <div class="footer-text">
                  Комитет национальной
                  безопасности Республики Казахстан
               </div>
               <ul class="footer-menu">
                  <li>
                     <a href="http://www.akorda.kz/ru" target="_blank">Сайт Президента РК</a>
                  </li>
                  <li>
                     <a href="https://primeminister.kz/ru" target="_blank">Сайт Премьер-Министра РК</a>
                  </li>
                  <li>
                     <a href="http://www.parlam.kz/ru" target="_blank">Сайт Парламента РК</a>
                  </li>
                  <li>
                     <a href="https://www.gov.kz/article/128915?lang=ru" target="_blank">Государственные символы РК</a>
                  </li>
                  <li>
                     <a href="http://www.akorda.kz/ru/addresses" target="_blank">Послания Президента РК</a>
                  </li>
                  <li>
                     <a href="https://www.gov.kz/memleket/entities/mam/documents/details/474854"
                        target="_blank">Национальный стандарт Республики Казахстан</a>
                  </li>
               </ul>
               <div class="footer-button">
                  <a href="#grata-header">
                     <span>Наверх</span>
                     <svg role="presentation" width="5" height="17" viewBox="0 0 6 20">
                        <path fill="#ffffff"
                           d="M5.78 3.85L3.12.28c-.14-.14-.3-.14-.43 0L.03 3.85c-.14.13-.08.27.13.27h1.72V20h2.06V4.12h1.72c.15 0 .22-.07.19-.17a.26.26 0 00-.07-.1z"
                           fill-rule="evenodd"></path>
                     </svg>
                  </a>
               </div>
            </div>
         </div>
      </footer>

   </div>

   <script src="js/grata-script.js"></script>
</body>

</html>