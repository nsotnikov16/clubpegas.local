
let parentList = document.querySelector('.js-hidden');
let paragraphs = parentList.querySelectorAll('p');
let showMore = document.querySelector('.interview__more');

if (paragraphs.length > 0) {
    if (paragraphs.length > 8) {
        parentList.classList.add('interview__blur');
        for (let i = 8; i < paragraphs.length; i++) {
            paragraphs[i].classList.add('interview__invisible');
        }
    } else {
        showMore.remove();
        parentList.classList.remove('interview__blur');
    }
}

function hiddenElem() {
    for (let i = 8; i < paragraphs.length; i++) {
        paragraphs[i].classList.remove('interview__invisible');
    }
}

showMore.addEventListener('click', function () {

    if (showMore.textContent.trim() === 'Показать полностью') {
        showMore.textContent = 'Скрыть';
        parentList.classList.remove('interview__blur');
    } else {
        showMore.textContent = 'Показать полностью';
        parentList.classList.add('interview__blur');
    }
})