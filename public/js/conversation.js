let slide = document.querySelector('.slide'),
    imgs = document.querySelectorAll('.slide img'),
    slide1 = document.querySelector('.slide1'),
    imgs1 = document.querySelectorAll('.slide1 img')

let index = 0

let interval = setInterval(run,6000)
function run(){
    index++;
    changeslide()
}
function changeslide(){
    if(index > imgs.length - 2){
        index = 0
    }
    else if(index < 0){
        index = imgs.length - 2
    }

    slide.style.cssText = `transform: translateY(${-index * 290}px)`
}

let index1 = 0

let interval1 = setInterval(run1,6000)
function run1(){
    index1++;
    changeslide1()
}
function changeslide1(){
    if(index1 > imgs1.length - 2){
        index1 = 0
    }
    else if(index1 < 0){
        index1 = imgs1.length - 2
    }

    slide1.style.cssText = `transform: translateY(${index1 * 290}px)`
}