document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.site-nav__toggle');
    const links = document.querySelector('.site-nav__links');

    if (toggle && links) {
        toggle.addEventListener('click', () => {
            const abierto = links.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', String(abierto));
        });

        links.querySelectorAll('a').forEach((link) => {
            const actual = window.location.pathname.split('/').pop() || 'index.php';
            if (link.getAttribute('href') === actual) {
                link.setAttribute('aria-current', 'page');
            }

            link.addEventListener('click', () => {
                if (window.matchMedia('(max-width: 700px)').matches) {
                    links.classList.remove('is-open');
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });
        });
    }
});
