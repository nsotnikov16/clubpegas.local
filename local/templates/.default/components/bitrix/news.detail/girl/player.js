
//Получаем объекты
//Плеер
var audioPlayer = document.getElementById('video-player');
//Время
var progressBar = document.getElementById('video-hud__progress-bar');
var currTime = document.getElementById('video-hud__curr-time');
var durationTime = document.getElementById('video-hud__duration');
//Кнопки
var actionButton = document.getElementById('video-hud__action');
var muteButton = document.getElementById('video-hud__mute');
var resetButton = document.getElementById('video-hud__reset');

//Запуск, пауза, сброс
actionButton.addEventListener('click', audioAct);
audioPlayer.addEventListener('click', audioAct);
resetButton.addEventListener('click', audioReset);

function audioAct() { //Запускаем или ставим на паузу
    if (audioPlayer.paused) {
        audioPlayer.play();
        actionButton.setAttribute('class', 'video-hud__element video-hud__action video-hud__action_play');
        actionButton.innerHTML = `<svg><use xlink:href="/local/assets/img/icons/playerSprite.svg#pause"></use></svg>`;
    } else {
        audioPlayer.pause();
        actionButton.setAttribute('class', 'video-hud__element video-hud__action video-hud__action_pause');
        actionButton.innerHTML = `<svg><use xlink:href="/local/assets/img/icons/playerSprite.svg#start"></use></svg>`;
    }
    if (durationTime.innerHTML == '00:00') {
        durationTime.innerHTML = audioTime(audioPlayer.duration);
    }
}


function audioReset() {
    audioPlayer.pause();
    actionButton.setAttribute('class', 'video-hud__element video-hud__action video-hud__action_pause');
    actionButton.innerHTML = `<svg><use xlink:href="/local/assets/img/icons/playerSprite.svg#start"></use></svg>`;
    audioPlayer.currentTime = 0;
}

function audioTime(time) { //Рассчитываем время в секундах и минутах
    time = Math.floor(time);
    var minutes = Math.floor(time / 60);
    var seconds = Math.floor(time - minutes * 60);
    var minutesVal = minutes;
    var secondsVal = seconds;
    if (minutes < 10) {
        minutesVal = '0' + minutes;
    }
    if (seconds < 10) {
        secondsVal = '0' + seconds;
    }
    return minutesVal + ':' + secondsVal;
}

function audioProgress() { //Отображаем время воспроизведения
    progress = (Math.floor(audioPlayer.currentTime) / (Math.floor(audioPlayer.duration) / 100));
    progressBar.value = progress;
    currTime.innerHTML = audioTime(audioPlayer.currentTime);
}

function audioChangeTime(coord) { //Перематываем

    let coffProgress = audioPlayer.duration / progressBar.offsetWidth // Коэффициент отношения длины аудио к ширине прогрессбара.
    audioPlayer.currentTime = coffProgress * coord; //Вычисляем координату клика в прогрессбаре и умножаем на коэффициент
    
}

let slug = false

//После загрузки метаданных аудио подставляем длительность трека
audioPlayer.addEventListener('loadedmetadata', () => {
    durationTime.innerHTML = audioTime(audioPlayer.duration);

    //Отображение времени
    audioPlayer.addEventListener('timeupdate', audioProgress);

    document.addEventListener('mousemove', (e)=>{
        coord = e.pageX - progressBar.getBoundingClientRect().left;
        rewind(coord);
    });

    progressBar.addEventListener('mousedown', () => {
        slug = true;
        audioPlayer.muted = true;
    })

    progressBar.addEventListener('click', (e) => {
        coord = e.pageX - progressBar.getBoundingClientRect().left;
        audioChangeTime(coord)
    })

    function rewind(coord) {
        if (!slug) return
        audioChangeTime(coord);
    }

    document.addEventListener('mouseup', () => {
        slug = false;
        audioPlayer.muted = false;
    });




    progressBar.addEventListener('touchstart', () => {
        slug = true;
        audioPlayer.muted = true;
    })

    progressBar.addEventListener('touchmove', (e) => {
        document.querySelector('body').style.overflow = 'hidden';
        rewind(e.touches[0].clientX - progressBar.getBoundingClientRect().left);
    });

    window.addEventListener('touchend', () => {
        document.querySelector('body').style.overflow = 'auto';
        slug = false;
        audioPlayer.muted = false;
    });














    //При окончании аудио, перемотка в 0
    audioPlayer.addEventListener('ended', audioReset)
})


