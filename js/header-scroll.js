document.addEventListener('DOMContentLoaded', () => {
  const masthead = document.getElementById('masthead');
  let lastScrollTop = 0;

  if (!masthead) {
      console.error('Masthead element not found');
      return;
  }

  window.addEventListener('scroll', () => {
      const currentScroll = window.scrollY;
      if (currentScroll > lastScrollTop && currentScroll > 10) {
          // Scroll Down
          masthead.classList.add('hide-masthead');
      } else {
          // Scroll Up
          masthead.classList.remove('hide-masthead');
      }
      lastScrollTop = currentScroll;
  });
});


//add underline under news menu item when inside post
document.addEventListener('DOMContentLoaded', () => {
    const currentUrl = window.location.href;
    const menuLinks = document.querySelectorAll('.multi-header-menu_container a');
    const isBlogPost = currentUrl.includes('/news/') || document.body.classList.contains('post-template-default');

    menuLinks.forEach(link => {
        if (link.href === currentUrl) {
            link.classList.add('active');
        } else if (isBlogPost && link.href.includes('/news')) {
            link.classList.add('active');
        }
    });
});



const menuTrigger = document.querySelector('.mw-menu-trigger');
const mobileMenuContainer = document.querySelector('.multiwave-mobile_menu_container ');
const multiLogo = document.querySelector('.multi-header-logo');
const fullPageBody = document.querySelector('body');

menuTrigger.addEventListener('click', () => {
    menuTrigger.classList.toggle('mobile-menu-open');
    mobileMenuContainer.classList.toggle('mw_menu_open');
    multiLogo.classList.toggle('mw-logo_open');
    fullPageBody.classList.toggle('mw-remove-scrolling');
});
