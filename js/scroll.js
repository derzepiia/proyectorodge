document.addEventListener("DOMContentLoaded", () => {

    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {

        link.addEventListener("click", function(e) {

            e.preventDefault();

            const target = document.querySelector(
                this.getAttribute("href")
            );

            if (!target) return;

            const navbar =
                document.querySelector(".main-navbar");

            const offset =
                navbar.offsetHeight;

            const start =
                window.pageYOffset;

            const end =
                target.getBoundingClientRect().top +
                window.pageYOffset -
                offset;

            const distance =
                end - start;

            const duration = 3500;

            let startTime = null;

            function easeInOutQuint(t) {
                return t < 0.5
                    ? 16 * t * t * t * t * t
                    : 1 - Math.pow(-2 * t + 2, 5) / 2;
            }

            function animation(currentTime) {

                if (!startTime) {
                    startTime = currentTime;
                }

                const elapsed =
                    currentTime - startTime;

                const progress =
                    Math.min(elapsed / duration, 1);

                const ease =
                    easeInOutQuint(progress);

                window.scrollTo(
                    0,
                    start + distance * ease
                );

                if (progress < 1) {
                    requestAnimationFrame(animation);
                }
            }

            requestAnimationFrame(animation);

        });

    });

});