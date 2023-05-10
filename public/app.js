"use script";

let video = document.querySelector(".video");
let img = document.createElement("img");


//определяем src видео и фоновой картинки
let videoSrc = video.dataset.videoSrc + "?rel=0&showinfo=0&autoplay=1";
let imgSrc = video.dataset.imgSrc;
img.setAttribute('src', imgSrc);
video.appendChild(img);


//функция - создает iframe для видео
let createIframe = () => {
    let iframe = document.createElement("iframe");
    
    iframe.setAttribute('src', videoSrc);
    iframe.setAttribute('allowfullscreen', '');
    iframe.setAttribute('allow', 'autoplay; encrypted-media')

    return iframe;
}


//запускаем создание iframe по клику на кнопку "воспроизведение"

video.addEventListener('click', function () {
    document.querySelector(".video-play").remove();
    img.remove();

    let iframe = createIframe();
    video.appendChild(iframe);
})