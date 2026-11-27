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

    const modalSiswa = document.getElementById('modal-siswa');
    if (modalSiswa) {
        const modalFoto = document.getElementById('modal-siswa-foto');
        const modalInitials = document.getElementById('modal-siswa-initials');
        const modalNama = document.getElementById('modal-siswa-nama');
        const modalJabatan = document.getElementById('modal-siswa-jabatan');
        const modalTentang = document.getElementById('modal-siswa-tentang');
        const modalSosmed = document.getElementById('modal-siswa-sosmed');
        const closeBtn = document.getElementById('modal-siswa-close');

        function openModalSiswa(data) {
            if (!data) return;

            // Foto & Initials
            if (data.foto) {
                modalFoto.src = data.foto;
                modalFoto.alt = 'Foto ' + (data.nama || '');
                modalFoto.hidden = false;
                modalInitials.hidden = true;
            } else {
                modalFoto.hidden = true;
                modalInitials.hidden = false;
                modalInitials.textContent = data.initials || '';
            }

            // Nama, Jabatan & Biodata
            modalNama.textContent = data.nama || '';
            modalJabatan.textContent = data.jabatan || 'Anggota';
            modalTentang.textContent = data.tentang_saya || data.deskripsi_singkat || 'Belum ada biodata singkat.';

            // Media Sosial (SVG Icons: Instagram & GitHub)
            modalSosmed.innerHTML = '';
            const sosmed = data.sosmed || {};
            let hasSosmed = false;

            const iconMap = {
                instagram: {
                    label: 'Instagram',
                    svg: '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>'
                },
                github: {
                    label: 'GitHub',
                    svg: '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>'
                }
            };

            for (const [platform, url] of Object.entries(sosmed)) {
                if (url && url.trim() !== '') {
                    hasSosmed = true;
                    const meta = iconMap[platform.toLowerCase()] || {
                        label: platform.charAt(0).toUpperCase() + platform.slice(1),
                        svg: '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/></svg>'
                    };

                    const a = document.createElement('a');
                    a.href = url;
                    a.target = '_blank';
                    a.rel = 'noopener noreferrer';
                    a.className = 'modal-siswa__social-btn';
                    a.innerHTML = meta.svg + '<span>' + meta.label + '</span>';
                    modalSosmed.appendChild(a);
                }
            }

            if (!hasSosmed) {
                const emptyMsg = document.createElement('span');
                emptyMsg.style.fontSize = '12px';
                emptyMsg.style.color = 'var(--muted)';
                emptyMsg.textContent = 'Tidak ada tautan media sosial';
                modalSosmed.appendChild(emptyMsg);
            }

            if (typeof modalSiswa.showModal === 'function') {
                modalSiswa.showModal();
            } else {
                modalSiswa.setAttribute('open', '');
            }
        }

        function closeModalSiswa() {
            if (typeof modalSiswa.close === 'function') {
                modalSiswa.close();
            } else {
                modalSiswa.removeAttribute('open');
            }
        }

        document.querySelectorAll('.member-card').forEach(function (card) {
            function triggerCard() {
                const dataRaw = card.getAttribute('data-detail');
                if (dataRaw) {
                    try {
                        const data = JSON.parse(dataRaw);
                        openModalSiswa(data);
                    } catch (e) {
                        console.error('Gagal parsing data detail:', e);
                    }
                }
            }

            card.addEventListener('click', triggerCard);

            card.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    triggerCard();
                }
            });
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', closeModalSiswa);
        }

        modalSiswa.addEventListener('click', function (event) {
            if (event.target === modalSiswa) {
                closeModalSiswa();
            }
        });
    }
});
