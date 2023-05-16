const swiper = new Swiper(".swiper", {
  autoplay: {
    delay: 2000,
  },
  navigation: {
    prevEl: ".swiper-button-prev",
    nextEl: ".swiper-button-next",
  },
  //   loop: true,
  slidesPerView: 3,
  spaceBetween: 18,

  //   pagination: {
  //     el: ".swiper-pagination",
  //     type: "bullets",
  //   },
});
