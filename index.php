<?php

$ver = '0.1';

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
   $buyer = 'vl';
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
   <meta name="referrer" content="no-referrer">
   <title>Международная юридическая фирма Trendlaws</title>
   <link rel="icon" type="image/x-icon" href="favicon.png?v=<?php echo $ver; ?>">

   <link rel="stylesheet" href="libs/intlTelInput.css">
   <link rel="stylesheet" href="css/styles_p2e7af7fc95.css?v=<?php echo $ver; ?>" type="text/css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
   <link href="css/validation.css" rel="stylesheet">
   <!-- <link rel="stylesheet" href="css/grata-style.min.css?v=0.0.2"> -->
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
    <div class="nav-menu-container">
        <div class="wrapper">
            <div class="nav-menu-block">
                <div style="background-image: url(images/logo.svg);" class="nav-menu-emblem"></div>
                <div class="nav-menu-links"> <a href="#who-we" onclick="document.location.hash='who-we';return false;">О нас</a> <a href="#reviews" onclick="document.location.hash='reviews';return false;">Отзывы</a> <a href="#stages" onclick="document.location.hash='stages';return false;">Этапы работы</a> <a href="#contacts" onclick="document.location.hash='contacts';return false;">Контакты</a> </div>
                <div class="nav-menu-burger"> <button class="nav-menu-burger-image"><img src="images/burger.svg" alt=""></button> </div>
            </div>
        </div>
    </div>
    <div class="title-container">
        <div class="wrapper">
            <div class="title-block"> <span class="title-top">Ваши деньги украли или заблокировали?</span> <span class="title-top-description">Вернём их за 14 дней – законно и безопасно!</span>
                <div class="emblem-container">
                    <div class="emblem-block"> <img src="images/emblem.svg" alt="emblem"> <span class="emblem-block-text">Официальный договор. <span class="emblem-block-text current">Оплата только за результат – никаких рисков для
                                вас!</span></span> </div>
                    <div class="emblem-block "> <img src="images/emblem.svg" alt="emblem"> <span class="emblem-block-text">Работаем с банками, <span class="emblem-block-text current">регуляторами и платежными системами по всему
                                миру.</span></span> </div>
                </div> <button class="title-block-button">Оставить заявку</button> <span class="emblem-block-text-bottom">Оставьте заявку – наш юрист расскажет как вернуть деньги!</span>
            </div>
        </div>
    </div>
    <div class="statistics-container"> <img src="images/statistics-background.svg" alt="" class="statistics-container-image"> <img src="images/lawyer.svg" alt="" class="lawyer-image">
        <div class="wrapper">
            <div class="statistics-block">
                <div class="statistics-block-text"> <span class="statistics-block-text-top" data-target="270">270</span>
                    <span class="statistics-block-text-center">миллионов €</span> <span class="statistics-block-text-bottom">возвращено</span> </div>
                <div class="statistics-block-text"> <span class="statistics-block-text-top" data-target="49">49</span>
                    <span class="statistics-block-text-center">закрытых</span> <span class="statistics-block-text-bottom">мошеннических компаний</span> </div>
            </div>
            <div class="statistics-title"> <img src="images/emblem.svg" alt="emblem">
                <div class="statistics-title-center"> <img src="images/line.svg" alt="emblem" class="line">
                    <span class="statistics-title-center-text">Юристы</span> <img src="images/line.svg" alt="emblem" class="line"> </div> <span class="statistics-title-bottom">Которые возвращают
                    деньги!</span>
            </div>
            <div class="who-we-block" id="who-we">
                <div class="who-we-block-left"> <span class="who-we-block-left-title">Кто мы?</span> <span class="who-we-block-left-description">В нашей команде – опытные юристы, финансовые аналитики и
                        эксперты по криптовалютам, которые знают, как найти и вернуть ваши деньги.</span> <span class="who-we-block-left-description-bottom">Мы сотрудничаем с банками, спецслужбами и
                        международными регуляторами, чтобы <span class="underline">добиваться реальных
                            результатов.</span></span> <button class="who-we-block-left-button">Оставить заявку</button>
                </div>
                <div class="who-we-block-right">
                    <div class="who-we-block-right-block"> <span class="who-we-block-right-block-title"> <span class="big">5</span>&nbsp;<span class="small nowrap">лет</span> </span> <span class="who-we-block-right-block-description">борьбы с финансовыми мошенниками</span> </div>
                    <div class="who-we-block-right-block"> <span class="who-we-block-right-block-title"> <span class="big">28</span>&nbsp;<span class="small nowrap">лет</span> </span> <span class="who-we-block-right-block-description">опыта в юриспруденции</span> </div>
                    <div class="who-we-block-right-block"> <span class="who-we-block-right-block-title"> <span class="big">840</span><br> <span class="small letter-spacing">тысяч $</span> </span>
                        <span class="who-we-block-right-block-description">максимальная сумма возврата в одном
                            кейсе</span> </div>
                </div>
            </div>
            <div class="chief-lawyer-block"> <img src="images/chief-lawyer.svg" alt="chief-lawyer">
                <div class="chief-lawyer-block-right"> <img src="images/comment.svg" alt="chief-lawyer">
                    <span class="chief-lawyer-title">За 5 лет я помог сотням людей вернуть их деньги и добиться
                        справедливости.</span> <span class="chief-lawyer-description">Мы закрыли 49 мошеннических
                        компаний и вернули <span class="underline">270 000 000 €</span> их законным владельцам.</span>
                </div>
                <div class="chief-lawyer-name"> <span class="chief-lawyer-name-top">Darius Keglic</span> <span class="chief-lawyer-name-center">Главный юрист TrendLaw</span> <span class="chief-lawyer-name-bottom">19 лет <span class="practice">юридической
                            практики</span></span> </div>
            </div>
            <div class="statistics-title"> <img src="images/emblem.svg" alt="emblem">
                <div class="statistics-title-center"> <img src="images/line.svg" alt="emblem" class="line">
                    <span class="statistics-title-center-text">Украли деньги?</span> <img src="images/line.svg" alt="emblem" class="line"> </div> <span class="statistics-title-bottom">Ты не один – тебя просто провели по классической схеме!</span>
            </div>
            <div class="fraud-schemes-block">
                <div class="fraud-card">
                    <div class="fraud-card-number"><span>1</span></div> <span class="fraud-card-title">Ваш брокер – это
                        казино</span> <span class="fraud-card-description">Ты пополнил счёт, трейдил, даже видел
                        “прибыль”, но вывести деньги невозможно?</span> <span class="fraud-card-description-bottom">Поздравляем, ты просто смотрел красивые цифры.</span>
                    <button class="button-back-money">вернуть деньги <img src="images/arrow.svg" alt="arrow"></button>
                </div>
                <div class="fraud-card">
                    <div class="fraud-card-number"><span>2</span></div> <span class="fraud-card-title">криптообменник-призрак</span> <span class="fraud-card-description">Перевёл деньги за крипту, но монеты так и не пришли?</span> <span class="fraud-card-description-bottom">Поддержка морозится, сайт пропал, а ты остался без
                        денег.</span> <button class="button-back-money">вернуть деньги <img src="images/arrow.svg" alt="arrow"></button>
                </div>
                <div class="fraud-card">
                    <div class="fraud-card-number"><span>3</span></div> <span class="fraud-card-title">Бинарные опционы
                        и псевдотрейдинг</span> <span class="fraud-card-description">На балансе растёт сумма, а когда
                        хочешь вывести – требуют ещё денег,</span> <span class="fraud-card-description-bottom">блокируют
                        аккаунт или придумывают "проблемы с верификацией".</span> <button class="button-back-money">вернуть деньги <img src="images/arrow.svg" alt="arrow"></button>
                </div>
                <div class="fraud-card">
                    <div class="fraud-card-number"><span>4</span></div> <span class="fraud-card-title">Служба
                        безопасности банка</span> <span class="fraud-card-description">Тебе позвонили “из банка” и
                        сказали, что с карты пытаются снять деньги?</span> <span class="fraud-card-description-bottom">А
                        потом ты сам перевёл всё "на безопасный счёт"…</span> <button class="button-back-money">вернуть
                        деньги <img src="images/arrow.svg" alt="arrow"></button>
                </div>
                <div class="fraud-card">
                    <div class="fraud-card-number"><span>5</span></div> <span class="fraud-card-title">Инвестируй в хайп
                        и стань миллионером</span> <span class="fraud-card-description">Тебе пообещали пассивный доход,
                        акции, IPO или майнинг?</span> <span class="fraud-card-description-bottom">А потом просто вывели
                        бабки, закрыли сайт и всё.</span> <button class="button-back-money">вернуть деньги <img src="images/arrow.svg" alt="arrow"></button>
                </div>
                <div class="fraud-card">
                    <div class="fraud-card-number"><span>6</span></div> <span class="fraud-card-title">Вложи сейчас –
                        получи x10 уже завтра</span> <span class="fraud-card-description">Чем круче обещания, тем
                        быстрее исчезает схема. Если ты купился – ты не один.</span> <span class="fraud-card-description-bottom">Но деньги ещё можно вернуть!</span> <button class="button-back-money">вернуть деньги <img src="images/arrow.svg" alt="arrow"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="leave-request-container">
        <div class="wrapper">
            <div class="leave-request-block">
                <div class="leave-request-logo"></div> <span class="leave-request-title">Мы работаем по всем
                    направлениям и с любым уровнем сложности!</span> <img src="images/line.svg" alt="line">
                <span class="leave-request-description">Оставляй заявку – мы разберем твой кейс и запустим процесс
                    возврата! </span> <button class="who-we-block-left-button">Оставить заявку</button>
            </div>
        </div>
    </div>
    <div class="step-by-step-container">
        <div class="wrapper">
            <div class="step-by-step-block">
                <div class="statistics-title"> <img src="images/emblem.svg" alt="emblem">
                    <div class="statistics-title-center"> <img src="images/line.svg" alt="emblem" class="line"> <span class="statistics-title-center-text">Как мы работаем</span> <img src="images/line.svg" alt="emblem" class="line"> </div> <span class="statistics-title-bottom">Пошаговый процесс</span>
                </div>
                <div class="step-by-step-row">
                    <div class="step-by-step-element visible"> <span class="step-top">01</span> <span class="step-center">Бесплатная консультация</span> <span class="step-bottom">разбор кейса за
                            24 часа</span> </div>
                    <div class="step-by-step-element visible"> <span class="step-top">02</span> <span class="step-center">Сбор
                            доказательств</span> <span class="step-bottom">анализ транзакций, переписки,
                            документов</span> </div>
                    <div class="step-by-step-element visible"> <span class="step-top">03</span> <span class="step-center">Процедура возврата</span> <span class="step-bottom">судебные и
                            досудебные методы</span> </div>
                    <div class="step-by-step-element visible"> <span class="step-top">04</span> <span class="step-center">Результат</span> <span class="step-bottom"> возврат средств на счёт
                            клиента</span> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="profit-container">
        <div class="profit-image"> <svg width="1006" height="708" viewBox="0 0 1006 708" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g style="mix-blend-mode:multiply" opacity="0.25">
                    <path d="M537.309 84.957H70.9717V123.346H537.309V84.957Z" fill="#5C5138"></path>
                    <path d="M699.042 177.472V110.762L1005.52 37.1306L996.716 0L660.65 80.5543V193.206C660.65 258.027 629.815 320.33 578.208 359.98C550.516 381.377 534.157 414.731 534.157 449.342V502.208C534.157 529.267 519.681 553.183 495.762 565.771L442.901 592.835V200.757H537.928C556.183 200.757 571.285 215.861 571.285 234.112V239.147C571.285 257.398 556.183 272.5 537.928 272.5C519.681 272.5 504.576 257.398 504.576 239.147V232.853H466.184V239.147C466.184 278.795 498.284 310.89 537.928 310.89C577.58 310.89 609.677 278.795 609.677 239.147V234.112C609.677 194.464 577.58 162.368 537.928 162.368H71.5954C31.946 162.368 -0.14856 194.464 -0.14856 234.112V239.147C-0.14856 278.795 31.946 310.89 71.5954 310.89C111.245 310.89 143.339 278.795 143.339 239.147V232.853H104.947V239.147C104.947 257.398 89.8451 272.5 71.5954 272.5C53.3458 272.5 38.2388 257.398 38.2388 239.147V234.112C38.2388 215.861 53.3458 200.757 71.5954 200.757H166.622V592.835L113.759 565.771C89.8451 553.183 75.3692 529.267 75.3692 502.208V449.342C75.3692 414.731 59.0076 380.746 31.3176 359.98C-20.2863 320.33 -51.1263 258.027 -51.1263 193.206V80.5543L-387.19 0L-396 37.1306L-89.5137 110.762V177.472L-301.6 126.496L-310.41 163.627L-88.2567 217.12C-85.7376 241.664 -80.0758 265.579 -70.6355 288.236L-216.012 253.622L-224.821 290.752L-46.0907 333.547C-30.9886 355.575 -13.3651 375.082 8.02975 390.817C26.2819 404.66 37.6078 426.688 37.6078 449.973V502.837C37.6078 543.743 60.2671 581.505 96.7689 600.383L305.08 708L513.386 600.383C549.887 581.505 572.542 544.374 572.542 502.837V449.973C572.542 426.688 583.244 404.66 602.125 390.817C623.522 374.456 641.769 354.944 656.245 333.547L834.978 290.752L826.164 253.622L680.787 288.236C690.228 265.579 695.897 241.664 698.406 217.12L920.562 163.627L911.758 126.496L699.042 177.472ZM404.511 612.966L369.267 631.22V201.387H404.511V612.966ZM204.384 201.387H239.623V631.22L204.384 612.966V201.387ZM278.018 650.727V201.387H330.879V650.727L304.446 664.577L278.018 650.727Z" fill="#5C5138"></path>
                </g>
            </svg> </div>
        <div class="wrapper">
            <div class="profit-block">
                <div class="statistics-title profit-block-title"> <svg width="54" height="48" viewBox="0 0 54 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.6" d="M47.6483 5.05798e-06H6.35167C5.51726 -0.00104504 4.69084 0.161423 3.91974 0.478106C3.14865 0.794788 2.44803 1.25946 1.85801 1.84551C1.26799 2.43156 0.80016 3.12747 0.481334 3.89338C0.162508 4.65929 -0.00105211 5.48015 5.09248e-06 6.30895V6.76423C0.00157701 8.43699 0.671281 10.0408 1.86211 11.2236C3.05293 12.4064 4.66759 13.0716 6.35167 13.0732C8.03575 13.0716 9.65037 12.4064 10.8412 11.2236C12.032 10.0408 12.7017 8.43699 12.7033 6.76423V6.20054H9.32014V6.76423C9.31107 7.54144 8.99469 8.28396 8.43931 8.83152C7.88393 9.37909 7.13406 9.68781 6.35153 9.69106C5.57131 9.68696 4.82423 9.37729 4.27251 8.82929C3.7208 8.28129 3.40903 7.53921 3.40491 6.76423V6.30895C3.40903 5.53397 3.7208 4.79189 4.27251 4.24389C4.82423 3.69589 5.57131 3.38621 6.35153 3.38212H14.7769V41.7127L27.0436 48L39.2449 41.7344V3.38212H47.6483C48.4308 3.38539 49.1807 3.69412 49.736 4.24168C50.2914 4.78925 50.6077 5.53175 50.6168 6.30895V6.76423C50.6077 7.54143 50.2914 8.28392 49.736 8.83149C49.1807 9.37906 48.4308 9.68779 47.6483 9.69106C46.8681 9.68694 46.121 9.37725 45.5693 8.82926C45.0176 8.28126 44.7058 7.5392 44.7017 6.76423V6.20054H41.2967V6.76423C41.2983 8.43698 41.9679 10.0408 43.1588 11.2236C44.3496 12.4064 45.9643 13.0716 47.6483 13.0732C49.3324 13.0716 50.9471 12.4064 52.1379 11.2236C53.3287 10.0408 53.9984 8.43699 54 6.76423V6.30895C54.001 5.48015 53.8375 4.65929 53.5186 3.89338C53.1998 3.12747 52.732 2.43156 52.142 1.84552C51.552 1.25947 50.8513 0.794793 50.0803 0.47811C49.3092 0.161427 48.4827 -0.00104218 47.6483 5.05798e-06ZM21.2377 41.2358L18.1164 39.6313V3.4255H21.2377V41.2358ZM29.3136 42.9485L26.9782 44.1843L24.6427 42.9485V3.42548H29.3136V42.9485ZM35.8399 39.6314L32.7187 41.2359V3.42559H35.8399V39.6314Z" fill="#F2F2EF"></path>
                    </svg>
                    <div class="statistics-title-center"> <img src="images/line.svg" alt="emblem" class="line"> <span class="statistics-title-center-text statistics-title-center-text-white">
                            Выгоды </span> <img src="images/line.svg" alt="emblem" class="line"> </div>
                    <span class="statistics-title-bottom statistics-title-bottom-white">Почему клиенты доверяют
                        нам?</span>
                </div>
                <div class="profit-list-item visible"> <img src="images/check-circle.svg" alt="check-circle"> <span class="profit-list-item-text">Юридическая прозрачность (официальный договор)</span> </div>
                <div class="profit-list-item-center-row">
                    <div class="profit-list-item visible"> <img src="images/check-circle.svg" alt="check-circle">
                        <span class="profit-list-item-text"> Конфиденциальность <br> и безопасность</span> </div>
                    <div class="profit-list-item-circle"> <span class="profit-list-item-circle-top">4,7</span> <img src="images/frame-star.svg" alt="check-circle"> <span class="profit-list-item-circle-bottom">средняя оценка наших клиентов</span> </div>
                    <div class="profit-list-item visible"> <img src="images/check-circle.svg" alt="check-circle">
                        <span class="profit-list-item-text">Работаем по всему <br> миру</span> </div>
                </div>
                <div class="profit-list-item visible"> <img src="images/check-circle.svg" alt="check-circle"> <span class="profit-list-item-text">Опытные юристы с международной практикой</span> </div>
            </div>
        </div>
    </div>
    <div class="leave-request-container-background">
        <div class="wrapper">
            <div class="leave-request-block">
                <div class="leave-request-logo"></div> <span class="leave-request-title">Успешно вернули деньги сотням
                    клиентов – вернём и вам!</span> <img src="images/line.svg" alt="line"> <span class="leave-request-description">Оставляйте заявку прямо сейчас! </span> <button class="who-we-block-left-button">Оставить заявку</button>
            </div>
        </div>
    </div>
    <div class="reviews-container">
        <div class="wrapper">
            <div class="reviews-block" id="reviews">
                <div class="reviews-block-title">
                    <div class="reviews-block-left-line"></div> <span class="reviews-block-title-text">Отзывы
                        клиентов</span>
                    <div class="reviews-block-right-line"></div>
                </div>
                <div class="swiper reviews-swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
                    <div class="swiper-wrapper" id="swiper-wrapper-ac177cf285734f24" aria-live="polite">
                        <div class="swiper-slide review-card swiper-slide-active" style="width: 420px; margin-right: 20px;" role="group" aria-label="1 / 6">
                            <div style="background-image: url(images/comment3.svg);" class="comment-image">
                            </div>
                            <div class="comment-text-container"> <a class="comment-link" href="#" onclick="document.location.hash='';return false;"></a> <span class="comment-name">Ксения</span> <span class="comment-age">26 лет</span> <span class="comment-sum">Вернули более 60 000$</span> <span class="comment-sum">Онлайн-Казино</span> <span class="comment-text">Искренне верила
                                    в шанс выиграть крупную сумму и решить все свои финансовые проблемы. Онлайн- казино
                                    привлекло ее...</span>
                                <div class="comment-rate-block">
                                    <div class="comment-rate"></div> <button class="comment-button">читать
                                        полностью</button>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide review-card swiper-slide-next" style="width: 420px; margin-right: 20px;" role="group" aria-label="2 / 6">
                            <div style="background-image: url(images/comment1.svg);" class="comment-image">
                            </div>
                            <div class="comment-text-container"> <a class="comment-link" href="#" onclick="document.location.hash='';return false;"></a> <span class="comment-name">виктория</span> <span class="comment-age">28 лет</span> <span class="comment-sum">Вернули 15 000$</span> <span class="comment-sum">Брокер</span>
                                <span class="comment-text">Всё началось с небольшого вложения в размере 250 долларов.
                                    Михаил, менеджер компании, уверенно заверял Викторию...</span>
                                <div class="comment-rate-block">
                                    <div class="comment-rate"></div> <button class="comment-button">читать
                                        полностью</button>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide review-card" style="width: 420px; margin-right: 20px;" role="group" aria-label="3 / 6">
                            <div style="background-image: url(images/comment2.svg);" class="comment-image">
                            </div>
                            <div class="comment-text-container"> <a class="comment-link" href="#" onclick="document.location.hash='';return false;"></a> <span class="comment-name">лилия</span> <span class="comment-age">36 лет</span> <span class="comment-sum">Вернули 3 000$ + компенсацию</span> <span class="comment-sum">Брокер</span> <span class="comment-text">Даже не догадывалась,
                                    что это был обман, до тех пор пока Бот не перестал быть активным. Тут и пришло
                                    осознание того, что...</span>
                                <div class="comment-rate-block">
                                    <div class="comment-rate"></div> <button class="comment-button">читать
                                        полностью</button>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide review-card" style="width: 420px; margin-right: 20px;" role="group" aria-label="4 / 6">
                            <div style="background-image: url(images/comment4.svg);" class="comment-image">
                            </div>
                            <div class="comment-text-container"> <a class="comment-link" href="#" onclick="document.location.hash='';return false;"></a> <span class="comment-name">Артем</span> <span class="comment-age">24 года</span> <span class="comment-sum">Вернули 9 000€</span> <span class="comment-sum">Брокерская
                                    организация</span> <span class="comment-text">После регистрации Артему позвонили из
                                    брокерской организации. Менеджеры активно уговаривали его вложить...</span>
                                <div class="comment-rate-block">
                                    <div class="comment-rate"></div> <button class="comment-button">читать
                                        полностью</button>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide review-card" style="width: 420px; margin-right: 20px;" role="group" aria-label="5 / 6">
                            <div style="background-image: url(images/comment5.svg);" class="comment-image">
                            </div>
                            <div class="comment-text-container"> <a class="comment-link" href="#" onclick="document.location.hash='';return false;"></a> <span class="comment-name">Александр</span> <span class="comment-age">41 год</span> <span class="comment-sum">Вернули 20 000$</span> <span class="comment-sum">Брокер</span>
                                <span class="comment-text">После первого разговора с представителем брокерской компании,
                                    Александр был впечатлен обещаниями о высоких доходах...</span>
                                <div class="comment-rate-block">
                                    <div class="comment-rate"></div> <button class="comment-button">читать
                                        полностью</button>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide review-card" role="group" aria-label="6 / 6" style="width: 420px; margin-right: 20px;">
                            <div class="comment-more-block">
                                <div class="comment-more-image"></div> <button class="comment-more-button">больше
                                    отзывов</button>
                            </div>
                        </div>
                    </div>
                    <div class="reviews-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span></div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            </div>
            <div class="stages-work-block" id="stages">
                <div class="reviews-block-title">
                    <div class="reviews-block-left-line"></div> <span class="reviews-block-title-text">этапы
                        работы</span>
                    <div class="reviews-block-right-line"></div>
                </div>
                <div class="swiper reviews-swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
                    <div class="swiper-wrapper" id="swiper-wrapper-0a8886010a8d62e9f" aria-live="polite">
                        <div class="swiper-slide review-card swiper-slide-active" style="width: 420px; margin-right: 20px;" role="group" aria-label="1 / 4">
                            <div style="background-image: url(images/step1.svg);" class="stages4-of-work-image">
                                <div class="stages-of-work-step">01</div>
                            </div>
                            <div class="stages-of-work-container"> <span class="comment-name">бесплатная
                                    консультация</span> <span class="comment-text">Оставьте заявку и в ближайшее время с
                                    вами свяжется наш специалист для предварительной оценки вашей ситуации. Сверяем ваше
                                    дело с уже имеющимся в нашем рабочем кейсе.</span> </div>
                        </div>
                        <div class="swiper-slide review-card swiper-slide-next" style="width: 420px; margin-right: 20px;" role="group" aria-label="2 / 4">
                            <div style="background-image: url(images/step2.svg);" class="stages4-of-work-image">
                                <div class="stages-of-work-step">02</div>
                            </div>
                            <div class="stages-of-work-container"> <span class="comment-name">Сбор данных и запуск
                                    процесса</span> <span class="comment-text">Подписание официального договора на
                                    оказание юридических услуг. Сбор доказательной базы правонарушения брокера. Передача
                                    Вашего дела на юриста который уже имел опыт работы конкретно с этим брокером.</span>
                            </div>
                        </div>
                        <div class="swiper-slide review-card" style="width: 420px; margin-right: 20px;" role="group" aria-label="3 / 4">
                            <div style="background-image: url(images/step3.svg);" class="stages4-of-work-image">
                                <div class="stages-of-work-step">03</div>
                            </div>
                            <div class="stages-of-work-container"> <span class="comment-name">Процедура возврата</span>
                                <span class="comment-text">Поиск конечного получателя денег которые вы отправили в
                                    брокерскую компанию. Оформление документов и запуск процесса по возврату денег с
                                    задействованием всевозможных инструментов и инстанций.</span> </div>
                        </div>
                        <div class="swiper-slide review-card" role="group" aria-label="4 / 4" style="width: 420px; margin-right: 20px;">
                            <div style="background-image: url(images/step4.svg);" class="stages4-of-work-image">
                                <div class="stages-of-work-step">04</div>
                            </div>
                            <div class="stages-of-work-container"> <span class="comment-name">Результат</span> <span class="comment-text">Как правило, брокеры добровольно отдают не только депозит, но и
                                    часть дохода с инвестиций, если он был, так как суд может привлечь внимание
                                    общественности. Вы получаете потерянные средства и оплачиваете работу юриста.</span>
                            </div>
                        </div>
                    </div>
                    <div class="reviews-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span></div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            </div>
        </div>
    </div>
    <div class="form-container">
        <div class="wrapper">
            <div class="form-block">
                <div class="form-block-left"> <img src="images/form-block-image.svg" alt="form-image">
                </div>
                <div class="form-block-right">
                    <div class="form-with-js-handler">
                        <div class="form-text-block">
                            <span class="form-text-block-title">наша Официальная регистрация
                                <span class="form-text-block-title-yellow">гарантирует</span> строгое <span class="form-text-block-title-yellow">соблюдение</span> требований законов ЕС</span>
                            <span class="form-text-block-description">Вся работа продолжится только после подписания договора</span>
                            <span class="form-text-block-footer">Закажите бесплатную консультацию
                                <span class="form-text-block-footer-small">(свободных мест - 7)</span></span>
                        </div>

                        <form class="classic-form" action="thank-you/thankyou.php" method="post">
                            <div class="cf-row">
                                <label class="cf-label" for="full_name">Ваше имя</label>
                                <input class="cf-input" type="text" id="f_name" name="f_name" placeholder="Иван Иванов">

                            </div>
                            <div class="cf-row">
                              <label class="cf-label" for="email">E-mail</label>
                              <input class="cf-input" type="email" id="email" name="email" placeholder="name@example.com">

                            </div>
                            <div class="cf-row">
                              <label class="cf-label" for="phone_raw">Телефон</label>
                              
                              <input type="hidden" name="phone" data-not-remember="">
                              <span id="invalidPhone" class="invalidPhone">Введите правильный номер телефона</span>
                              <style>
                                  .invalidPhone,
                                  .invalidEmail {
                                      display: none;
                                      color: red;
                                  }
                              </style>
                              <!--?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?-->
                              <input type="hidden" name="site" value="<?php echo $actual_link ?>">
                              <input type="hidden" name="pixel" value="<?php echo $_GET['pixel'] ?>">
                            </div>
                            <div class="cf-actions">
                                <button type="submit" id="btn" class="title-block-button">Оставить заявку</button>
                                <span class="cf-note">Нажимая кнопку, вы отправляете заявку на консультацию.</span>
                            </div>
                        <input type="hidden" name="utm_creative" value="img"><input type="hidden" name="ad_id" value="{{ad.id}}"><input type="hidden" name="pixel" value="1"><input type="hidden" name="_token" value="uuid_26debdhmh5c_26debdhmh5c68cbc526a40238.67733796"><input type="hidden" name="_subid" value="26debdhmh5c"><input type="hidden" name="_token" value="uuid_26debdhmh5c_26debdhmh5c68cbc526a40238.67733796"></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="faq-container">
        <div class="wrapper">
            <div class="faq-block"> <span class="faq-block-title">часто спрашивают</span>
                <div class="list-questions">
                    <div class="faq-column">
                        <div class="faq-item">
                            <div class="faq-question"> <span>Сколько времени займет процесс возврата средств?</span>
                                <div class="faq-icon"></div>
                            </div>
                            <div class="faq-answer">Все индивидуально, но обычно от недели до нескольких месяцев, в
                                зависимости от сложности и юрисдикции.</div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"> <span>Есть ли вероятность наказания мошенников?</span>
                                <div class="faq-icon"></div>
                            </div>
                            <div class="faq-answer">Есть ли вероятность наказания мошенников?</div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"> <span>Какие документы мне нужно предоставить?</span>
                                <div class="faq-icon"></div>
                            </div>
                            <div class="faq-answer">Какие документы мне нужно предоставить?</div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"> <span>Как определить, легален ли брокер, с которым я
                                    работал?</span>
                                <div class="faq-icon"></div>
                            </div>
                            <div class="faq-answer">Как определить, легален ли брокер, с которым я работал?</div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"> <span>Можно ли что-то сделать, если мой брокер работал без
                                    лицензии?</span>
                                <div class="faq-icon"></div>
                            </div>
                            <div class="faq-answer">Можно ли что-то сделать, если мой брокер работал без лицензии?</div>
                        </div>
                    </div>
                    <div class="faq-column">
                        <div class="faq-item">
                            <div class="faq-question"> <span>Какие действия я должен предпринять прямо сейчас?</span>
                                <div class="faq-icon"></div>
                            </div>
                            <div class="faq-answer">Какие действия я должен предпринять прямо сейчас?</div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"> <span>Если мошенники находятся за границей, возможно ли вернуть
                                    деньги?</span>
                                <div class="faq-icon"></div>
                            </div>
                            <div class="faq-answer">Если мошенники находятся за границей, возможно ли вернуть деньги?
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"> <span>Что делать, если брокер больше не выходит на связь?</span>
                                <div class="faq-icon"></div>
                            </div>
                            <div class="faq-answer">Что делать, если брокер больше не выходит на связь?</div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"> <span>Могу ли я вернуть деньги, если переводил их через
                                    криптовалюты?</span>
                                <div class="faq-icon"></div>
                            </div>
                            <div class="faq-answer">Могу ли я вернуть деньги, если переводил их через криптовалюты?
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question"> <span>Что если брокер дал мне кредит и требует замещение
                                    средств?</span>
                                <div class="faq-icon"></div>
                            </div>
                            <div class="faq-answer">Что если брокер дал мне кредит и требует замещение средств?</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-container">
        <div class="wrapper">
            <div class="footer-block" id="contacts">
                <div class="footer-block-left"> <span class="footer-block-left-title">Контакты</span>
                    <div class="footer-block-left-address"> <img src="images/logo.svg" alt="logo"> <span class="footer-block-left-address-text"> Law firm TrendLaw <br> <span class="address-text-thin"> Oldenzaalsestraat 212, 7557GC Hengelo, Netherlands </span>
                        </span> </div> <a href="tel:+31616479336" target="_blank" class="footer-block-left-phone-number">+31616479336</a>
                    <div class="footer-block-left-messenger"> <a href="t.me/test.html" target="_blank" class="footer-block-left-messenger-button"><img src="images/telegram-icon.svg" alt="logo">Telegram</a> <a href="wa.me/+31616479336.html" target="_blank" class="footer-block-left-messenger-button"><img src="images/whatsapp.svg" alt="logo">WhatsApp</a> </div> <span class="footer-block-left-mail">support@trendlawyers.info</span>
                    <div class="privacy-policy-block"> <a href="#" onclick="document.location.hash='';return false;" class="privacy-policy-text">Пользовательское соглашение</a> <a href="#" onclick="document.location.hash='';return false;" class="privacy-policy-text">Политика конфиденциальности</a> </div>
                    <div class="footer-block-left-bottom"> <img src="images/img.svg"> <span class="footer-block-left-bottom-text">TrendLaw, 2025</span> </div>
                </div>
                <div class="footer-block-right"> <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2464.772113212878!2d4.4969328!3d51.7385801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c431ac5fa8eb31%3A0x2c9b5b4de140fe10!2sWestdijk%2051%2C%203271%20LL%20Mijnsheerenland%2C%20Netherlands!5e0!3m2!1sen!2s!4v1620200000000!5m2!1sen!2s" width="760" height="349" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"> </iframe> </div>
            </div>
        </div>
    </div>
    

   <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

   <script src="libs/intlTelInput.min.js"></script>
   <script src="js/grata-form-script.js?v=0.0.2"></script>
   <script src="js/grata-script.js?v=0.0.2"></script>
    

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!-- <script src="./js/validation.js"></script> -->



</body>

</html>