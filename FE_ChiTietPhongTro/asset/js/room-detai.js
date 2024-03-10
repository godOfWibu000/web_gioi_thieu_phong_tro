function toggleLove() {
    var loveRoom = document.querySelector('.love-room');
    var unloveRoom = document.querySelector('.unlove-room');

    if (loveRoom.style.display !== 'none') {
        loveRoom.style.display = 'none';
        unloveRoom.style.display = 'inline-block';
    } else {
        loveRoom.style.display = 'inline-block';
        unloveRoom.style.display = 'none';
    }
}

$('.list-room-other').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: `<button type='button' class='slick-arrow slick-prev pull-left'><i class="fa-solid fa-chevron-left"></i></button>`,
    nextArrow: `<button type='button' class='slick-arrow slick-next pull-right'><i class="fa-solid fa-chevron-right"></i></button>`,

});