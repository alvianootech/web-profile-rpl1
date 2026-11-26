document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.nav-toggle');
    const menu = document.querySelector('.nav-menu');

    if (toggle && menu) {
        function closeMenu() {
            menu.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'Buka menu');
        }

        toggle.addEventListener('click', function () {
            const isOpen = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', String(isOpen));
            toggle.setAttribute('aria-label', isOpen ? 'Tutup menu' : 'Buka menu');
        });

        menu.addEventListener('click', function (event) {
            if (event.target.closest('a')) closeMenu();
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeMenu();
        });
    }

    const search = document.getElementById('search-anggota');
    if (search) {
        const cards = Array.from(document.querySelectorAll('.member-grid > li'));
        const status = document.getElementById('search-status');
        const empty = document.getElementById('search-empty');

        function applyFilter() {
            const query = search.value.trim().toLowerCase();
            let visible = 0;

            cards.forEach(function (card) {
                const text = (card.dataset.search || card.textContent).toLowerCase();
                const match = text.includes(query);
                card.hidden = !match;
                if (match) visible++;
            });

            if (status) {
                status.textContent = query ? visible + ' anggota cocok' : '';
            }
            if (empty) {
                empty.hidden = visible !== 0;
            }
        }

        search.addEventListener('input', applyFilter);
    }

    const lightbox = document.getElementById('lightbox');
    if (lightbox) {
        const image = lightbox.querySelector('.lightbox__image');
        const caption = lightbox.querySelector('.lightbox__caption');
        const closeButton = lightbox.querySelector('.lightbox__close');

        function closeLightbox() {
            if (typeof lightbox.close === 'function') {
                lightbox.close();
            } else {
                lightbox.removeAttribute('open');
            }
        }

        document.querySelectorAll('.gallery-card').forEach(function (card) {
            card.addEventListener('click', function () {
                const src = card.dataset.src || '';
                const text = card.dataset.caption || '';

                image.src = src;
                image.alt = text;
                caption.textContent = text;

                if (typeof lightbox.showModal === 'function') {
                    lightbox.showModal();
                } else {
                    lightbox.setAttribute('open', '');
                }
            });
        });

        closeButton.addEventListener('click', closeLightbox);

        lightbox.addEventListener('click', function (event) {
            if (event.target === lightbox) closeLightbox();
        });
    }
});
