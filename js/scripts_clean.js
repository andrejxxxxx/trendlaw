
function animateValue(el, target, duration = 1500) {
    const start = 0;
    const range = target - start;
    const startTime = performance.now();
    function step(currentTime) {
        const progress = Math.min((currentTime - startTime) / duration, 1);
        const value = Math.floor(progress * range + start);
        el.textContent = value;
        if (progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
}

const observer = new IntersectionObserver(
    (entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.getAttribute("data-target"), 10);
                animateValue(el, target);
                observer.unobserve(el);
            }
        });
    },
    { threshold: 0.6 }
);

document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".statistics-block-text-top").forEach((el) => {
        observer.observe(el);
    });

    const elements = document.querySelectorAll(".step-by-step-element");
    const observer = new IntersectionObserver(
        (entries, observer) => {
            let delay = 0;
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    setTimeout(() => {
                        el.classList.add("visible");
                    }, delay);
                    delay += 500;
                    observer.unobserve(el);
                }
            });
        },
        { threshold: 0.5 }
    );
    elements.forEach((el) => observer.observe(el));


    const items = document.querySelectorAll(".profit-list-item");
    const observer = new IntersectionObserver(
        (entries, observer) => {
            let delay = 0;
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    setTimeout(() => {
                        el.classList.add("visible");
                    }, delay);
                    delay += 200;
                    observer.unobserve(el);
                }
            });
        },
        { threshold: 0.3 }
    );
    items.forEach((el) => observer.observe(el));


    new Swiper(".reviews-swiper", {
        slidesPerView: 3,
        spaceBetween: 20,
        pagination: { el: ".reviews-pagination", clickable: true, bulletClass: "swiper-pagination-bullet", bulletActiveClass: "swiper-pagination-bullet-active" },
        breakpoints: { 0: { slidesPerView: 1 }, 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } },
    });

    const questions = document.querySelectorAll(".faq-question");
    questions.forEach((question) => {
        question.addEventListener("click", function () {
            const item = this.parentElement;
            item.classList.toggle("active");
        });
    });

    const formButtons = document.querySelectorAll(".title-block-button, .who-we-block-left-button, .button-back-money");
    const formBlock = document.querySelector(".form-block");
    formButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            if (formBlock) {
                formBlock.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        });
    });
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        });
    });

});
