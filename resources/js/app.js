import './bootstrap';

const themeButton = document.querySelector('[data-theme-toggle]');
const menuButton = document.querySelector('[data-menu-toggle]');
const siteHeader = document.querySelector('[data-site-header]');
const projectDialog = document.querySelector('[data-project-dialog]');
const scrollProgress = document.querySelector('[data-scroll-progress]');
const scrollToTopButton = document.querySelector('[data-back-to-top]');
let projectDialogTrigger = null;

const setTheme = (theme) => {
    document.documentElement.dataset.theme = theme;
    themeButton?.setAttribute('aria-pressed', String(theme === 'dark'));
    themeButton?.setAttribute('aria-label', theme === 'dark' ? 'Aktifkan tema terang' : 'Aktifkan tema gelap');
    localStorage.setItem('portfolio-theme', theme);

    const themeColor = getComputedStyle(document.documentElement).getPropertyValue('--page').trim();
    document.querySelector('meta[name="theme-color"]')?.setAttribute('content', themeColor);
};

setTheme(document.documentElement.dataset.theme === 'dark' ? 'dark' : 'light');

themeButton?.addEventListener('click', () => {
    setTheme(document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark');
});

const closeMobileMenu = () => {
    siteHeader?.removeAttribute('data-menu-open');
    menuButton?.setAttribute('aria-expanded', 'false');
    menuButton?.setAttribute('aria-label', 'Buka menu navigasi');
};

menuButton?.addEventListener('click', () => {
    const isOpen = siteHeader?.getAttribute('data-menu-open') === 'true';
    siteHeader?.setAttribute('data-menu-open', String(!isOpen));
    menuButton.setAttribute('aria-expanded', String(!isOpen));
    menuButton.setAttribute('aria-label', isOpen ? 'Buka menu navigasi' : 'Tutup menu navigasi');
});

siteHeader?.querySelectorAll('.site-nav a').forEach((link) => {
    link.addEventListener('click', closeMobileMenu);
});

document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') {
        return;
    }

    if (projectDialog?.open) {
        event.preventDefault();
        projectDialog.close();
        return;
    }

    if (siteHeader?.getAttribute('data-menu-open') === 'true') {
        closeMobileMenu();
        menuButton?.focus();
    }
});

document.querySelectorAll('.project-open').forEach((button) => {
    button.addEventListener('click', () => {
        projectDialogTrigger = button;
        projectDialog.querySelector('[data-dialog-category]').textContent = button.dataset.projectCategory;
        projectDialog.querySelector('[data-dialog-title]').textContent = button.dataset.projectTitle;
        projectDialog.querySelector('[data-dialog-description]').textContent = button.dataset.projectDescription;
        projectDialog.querySelector('[data-dialog-details]').textContent = button.dataset.projectDetails;
        projectDialog.showModal();
    });
});

projectDialog?.addEventListener('close', () => projectDialogTrigger?.focus());

projectDialog?.querySelector('[data-dialog-close]')?.addEventListener('click', () => {
    projectDialog.close();
});

projectDialog?.addEventListener('click', (event) => {
    if (event.target === projectDialog) {
        projectDialog.close();
    }
});

const navigationLinks = siteHeader?.querySelectorAll('.site-nav a') ?? [];
const navigationSections = [...navigationLinks]
    .map((link) => document.querySelector(link.getAttribute('href')))
    .filter(Boolean);
let scrollUpdatePending = false;

const updateScrollState = () => {
    const scrollableHeight = document.documentElement.scrollHeight - window.innerHeight;
    const progress = scrollableHeight > 0
        ? Math.min(100, Math.round((window.scrollY / scrollableHeight) * 100))
        : 0;

    if (scrollProgress) {
        scrollProgress.querySelector('span').style.width = `${progress}%`;
        scrollProgress.setAttribute('aria-valuenow', String(progress));
    }

    if (scrollToTopButton) {
        const shouldShowButton = window.scrollY > 520;
        scrollToTopButton.hidden = !shouldShowButton;
        scrollToTopButton.classList.toggle('is-visible', shouldShowButton);
    }

    const isAtPageBottom = window.scrollY + window.innerHeight >= document.documentElement.scrollHeight - 2;
    const activeSection = isAtPageBottom
        ? navigationSections.at(-1)
        : navigationSections
            .filter((section) => section.getBoundingClientRect().top <= 105)
            .at(-1);

    navigationLinks.forEach((link) => {
        if (link.getAttribute('href') === `#${activeSection?.id}`) {
            link.setAttribute('aria-current', 'location');
        } else {
            link.removeAttribute('aria-current');
        }
    });

    scrollUpdatePending = false;
};

window.addEventListener('scroll', () => {
    if (scrollUpdatePending) {
        return;
    }

    scrollUpdatePending = true;
    window.requestAnimationFrame(updateScrollState);
}, { passive: true });

updateScrollState();

scrollToTopButton?.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth',
    });
});

if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    document.documentElement.classList.add('reveal-ready');
    const observer = new IntersectionObserver((entries, currentObserver) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                currentObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));
}
