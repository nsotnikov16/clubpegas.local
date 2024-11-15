document.addEventListener('DOMContentLoaded', function () {
    let flag = 0;

    let videoPlay = document.querySelector('.js-video');

    swiperGirl.on('slideChange', function () {
        setTimeout(() => {
            const active = this.el.querySelector('.swiper-slide-active');
            if (active.classList.contains('js-poster')) {
                active.append(videoPlay)
                if (flag === 0) {
                    videoPlay.play();
                    flag = 1;
                }
            } else {
                videoPlay.pause()
            }
        }, 1)
    });


})