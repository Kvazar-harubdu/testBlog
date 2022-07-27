const slider = document.querySelector('.slider');
const siderContent = document.querySelector('.slider__container');
const sliderImg = document.querySelectorAll('.slider__img');
const sliderBtn = document.querySelectorAll('.slider__btn');

let activeOrder = 0;

init();

function init() {
  for (let i = 0; i < sliderImg.length; i++) {
    const slide = sliderImg[i];

    slide.dataset.order = i;
    slide.style.transform = `translate(-50%, -50%)`;
    slide.addEventListener('click', clickHandler);
  }

  for (const navigation of sliderBtn) {
    navigation.addEventListener('click', navigationHandler);
  }

  activeOrder = Math.floor(sliderImg.length / 2);
  updata();
}

function updata() {
  const {
    width,
    height
  } = siderContent.getBoundingClientRect();
  const slideRect = sliderImg[0].getBoundingClientRect();
  const a = width / 2;
  const b = height / 2 + slideRect.height / 3 - 30;
  const delta = Math.PI / sliderImg.length / 4;

  for (let i = 0; i < sliderImg.length; i++) {

    const leftSlider = document.querySelector(`.slider__img[data-order="${activeOrder - i}"]`);

    if (leftSlider) {
      leftSlider.style.zIndex = sliderImg.length - i;
      leftSlider.style.opacity = 1 - (2 * i) / sliderImg.length;
      leftSlider.style.left = `${width / 2 + a * Math.cos((Math.PI * 3) / 2 - delta * i * 2)}px`;

      leftSlider.style.top = `${-b * Math.sin((Math.PI * 3) / 2 - delta * i *2)}px`;
    }

    const rightSlider = document.querySelector(`.slider__img[data-order="${activeOrder + i}"]`);

    if (rightSlider) {
      rightSlider.style.zIndex = sliderImg.length - i;
      rightSlider.style.opacity = 1 - (2 * i) / sliderImg.length;
      rightSlider.style.left = `${width / 2 + a * Math.cos((Math.PI * 3) / 2 + delta * i * 2)}px`;

      rightSlider.style.top = `${-b * Math.sin((Math.PI * 3) / 2 + delta * i *2)}px`;
    }
  }
}

function clickHandler() {
  const order = parseInt(this.dataset.order, 10);
  activeOrder = order;
  updata();
}

function navigationHandler() {
  const {
    dir
  } = this.dataset;

  if (dir === "prev") {
    activeOrder = Math.max(0, activeOrder - 1);
  } else if (dir === "next") {
    activeOrder = Math.min(sliderImg.length - 1, activeOrder + 1);
  }

  updata();
}
