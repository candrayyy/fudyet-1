const swiper = new Swiper(".allergies", {
    slidesPerView: 2,
    spaceBetween: 20,
    slidesPerGroup: 2,
    loop: false,
    loopFillGroupWithBlank: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
