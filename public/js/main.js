let showeditima = document.querySelector('.showeditima'),
    changeima = document.querySelector('.changeima'),
    emailchange = document.querySelector('.change_email'),
    delet = document.querySelector('.delete'),
    delet2 = document.querySelector('.delete2'),
    clickemail = document.querySelector('.clickemail'),
    creerapropos = document.querySelector('.creerapropos'),
    delete3 = document.querySelector('.delete3'),
    creerpos = document.querySelector('.creerpos')

showeditima.addEventListener('click', function(){
    changeima.classList.toggle('changeshow')
})

delet.addEventListener('click', function(){
    changeima.classList.toggle('changeshow')
})

delet2.addEventListener('click', function(){
    emailchange.classList.toggle('showemail')
})

clickemail.addEventListener('click', function(){
    emailchange.classList.toggle('showemail')
})

creerpos.addEventListener('click', function(){
    creerapropos.classList.toggle('showpropos')
})

delete3.addEventListener('click', function(){
    creerapropos.classList.toggle('showpropos')
})
