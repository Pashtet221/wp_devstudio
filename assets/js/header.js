document.addEventListener('DOMContentLoaded', () => {
  const servicesButton = document.querySelector('.wpds-header__services-toggle');
  const megaMenu = document.getElementById('services-megamenu');
  const searchButton = document.querySelector('.wpds-header__search-toggle');
  const search = document.getElementById('header-search');
  const burger = document.querySelector('.wpds-header__burger');
  const mobileMenu = document.getElementById('wpds-mobile-menu');

  const setOpen = (button, panel, open) => {
    if (!button || !panel) return;
    button.setAttribute('aria-expanded', String(open));
    panel.hidden = !open;
  };

  servicesButton?.addEventListener('click', () => {
    const willOpen = servicesButton.getAttribute('aria-expanded') !== 'true';
    setOpen(searchButton, search, false);
    setOpen(servicesButton, megaMenu, willOpen);
  });

  searchButton?.addEventListener('click', () => {
    const willOpen = searchButton.getAttribute('aria-expanded') !== 'true';
    setOpen(servicesButton, megaMenu, false);
    setOpen(searchButton, search, willOpen);
    if (willOpen) search.querySelector('input')?.focus();
  });

  burger?.addEventListener('click', () => {
    const willOpen = burger.getAttribute('aria-expanded') !== 'true';
    setOpen(burger, mobileMenu, willOpen);
  });

  document.addEventListener('click', (event) => {
    if (!event.target.closest('.wpds-header__services-toggle, .wpds-mega')) setOpen(servicesButton, megaMenu, false);
    if (!event.target.closest('.wpds-header__search-toggle, .wpds-header__search')) setOpen(searchButton, search, false);
  });

  document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') return;
    setOpen(servicesButton, megaMenu, false);
    setOpen(searchButton, search, false);
    setOpen(burger, mobileMenu, false);
  });
});
