
let rootElement = document.querySelector(':root');
let contactForm = document.querySelector('#contact-form');
let statusMessage = document.querySelector('#status-message');
let unigestFullImage = document.querySelector('#unigest-full-image');
let unigestSmallImage = document.querySelector('#unigest-small-image');
let goTopButton = document.querySelector('#go-top-button');
let navbarMenu = document.querySelector('#navbar-menu');
let navbarListItem = document.querySelector('#navbar-list-item');
let colorSelector = document.querySelector('#color-selector');
let savedColor = localStorage.getItem('color');
let isNavbarOpen = false;


function onScrollTop() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    goTopButton.style.visibility = 'visible';
    goTopButton.style.opacity = '1';
  }
  else {
    goTopButton.style.visibility = 'hidden';
    goTopButton.style.opacity = '0';
  }
}

function goTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function onScreenMatch(screen) {
  // match the screen
  if (screen.matches) {
    navbarListItem.style.opacity = '1';
    navbarListItem.style.visibility = 'visible';

    cards.forEach((card) => {
      cardsObserver.observe(card);
    });

    unigestFullImage.classList.add('no-display');
    unigestSmallImage.classList.remove('no-display');
  }
  else {
    navbarListItem.style.opacity = '0';
    navbarListItem.style.visibility = 'hidden';

    cards.forEach((card) => {
      cardsObserver.unobserve(card);
      card.classList.add('card-show');
    });

    unigestFullImage.classList.remove('no-display');
    unigestSmallImage.classList.add('no-display');
  }
}

function observeSkillBar(screen) {
  if (screen.matches) {
    skillBars.forEach((skillBar) => {
      skillBarsObserver.observe(skillBar);
    });
  }
  else {
    skillBars.forEach((skillBar) => {
      skillBarsObserver.unobserve(skillBar);
      skillBar.classList.add('skill-bar-fill-show');
    });
  }
}

// Initialize the color selector with the saved color
colorSelector.value = savedColor;
rootElement.style.setProperty('--custom-color', savedColor);


// The window scroll event
window.onscroll = () => {
  onScrollTop();
  if(isNavbarOpen) {
    navbarMenu.dispatchEvent(new Event('click'));
  }
};

goTopButton.addEventListener('click', goTop);

colorSelector.addEventListener('change', () => {
  rootElement.style.setProperty('--custom-color', colorSelector.value);
  localStorage.setItem('color', colorSelector.value);
});

navbarMenu.addEventListener('click', () => {
  navbarMenu.classList.toggle('active');
  if(isNavbarOpen) {
    navbarMenu.firstElementChild.innerHTML = 'menu';
    isNavbarOpen = false;
    navbarListItem.style.visibility = 'hidden';
    navbarListItem.style.opacity = '0';
  }
  else {
    navbarMenu.firstElementChild.innerHTML = 'close';
    isNavbarOpen = true;
    navbarListItem.style.visibility = 'visible';
    navbarListItem.style.opacity = '1';
  }
});

contactForm.addEventListener('submit', (event) => {
  event.preventDefault();
  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'contact-form.php', true);
  xhr.onload = () => {
    if(xhr.readyState == 4 && xhr.status === 200) {
      let response = JSON.parse(xhr.responseText);
      if(response.status) {
        statusMessage.classList.remove('error-color');
        statusMessage.classList.add('pending-color');
        statusMessage.textContent = response.text;
        contactForm.reset();
      }
      else {
        statusMessage.classList.add('error-color');
        statusMessage.classList.remove('pending-color');
        statusMessage.textContent = response.text;
      }
    }
  }
  let formData = new FormData(contactForm);
  xhr.send(formData);
});


// Get all the card elements
const cards = document.querySelectorAll('.card');
// Initialize an IntersectionObserver for the cards
const cardsObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      // Add the show class when the card is in the viewport
      entry.target.classList.toggle('card-show', entry.isIntersecting);
    });
  },
  {
    threshold: .3,
    rootMargin: '-100px'
  }
);
// Observe the cards if they match the screen
// See the onSecreenMatch() function


// Get all the skill-bar elements
const skillBars = document.querySelectorAll('.skill-bar-fill');
// Initialize an IntersectionObserver for the skill bars
const skillBarsObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      // Add the show class when the skill bar is in the viewport
      entry.target.classList.toggle('skill-bar-fill-show', entry.isIntersecting);
    });
  },
  {
    threshold: 1,
    rootMargin: "-100px"
  }
);
let screen500 = window.matchMedia('(min-width: 780px)');
screen500.addListener(observeSkillBar);
observeSkillBar(screen500);


// Initialize the screen match 
let screen = window.matchMedia('(min-width: 1000px)');
screen.addListener(onScreenMatch);
onScreenMatch(screen);
