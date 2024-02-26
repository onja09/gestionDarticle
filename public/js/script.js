// MESSAGE SUCCESS
const success = document.querySelector('.success'),
        blocdec = document.querySelector('.blocdec'),
        dec = document.querySelector('.dec'),
        nonbtn = document.querySelector('.nonbtn')

setTimeout(() => {
    success.style.cssText = 'display: none'    
}, 3000);

dec.addEventListener('click', function(){
    blocdec.style.cssText = 'top: 0'
});

nonbtn.addEventListener('click', function(){
    blocdec.style.cssText = 'top: -100vh'
});


const angleup6 = document.querySelector('.angleup6')
// FORM ARTICLE GESTION 
const formarticle = document.querySelector('.formarticle'),
        blocformarticle = document.querySelector('.blocformarticle'),
        angleup1 = document.querySelector('.angleup1'),
        angledown1 = document.querySelector('.angledown1'),
        blocangle1 = document.querySelector('.blocangle1'),
        angleup2 = document.querySelector('.angleup2'),
        angledown2 = document.querySelector('.angledown2'),
        blocangle2 = document.querySelector('.blocangle2')

blocangle1.addEventListener('click', function(){
    formarticle.classList.toggle('active')
    blocformarticle.classList.toggle('active')
})        

blocangle2.addEventListener('click', function(){
    formarticle.classList.toggle('active')
    blocformarticle.classList.toggle('active')
})

angleup1.addEventListener('click', function(){
    angleup1.style.cssText = 'display: none'
    angleup2.style.cssText = 'display: none'
    angledown1.style.cssText = 'display: flex'
    angledown2.style.cssText = 'display: flex'
})

angleup2.addEventListener('click', function(){
    angleup1.style.cssText = 'display: none'
    angleup2.style.cssText = 'display: none'
    angledown1.style.cssText = 'display: flex'
    angledown2.style.cssText = 'display: flex'
})

angledown1.addEventListener('click', function(){
    angleup1.style.cssText = 'display: flex'
    angleup2.style.cssText = 'display: flex'
    angledown1.style.cssText = 'display: none'
    angledown2.style.cssText = 'display: none'
})

angledown2.addEventListener('click', function(){
    angleup1.style.cssText = 'display: flex'
    angleup2.style.cssText = 'display: flex'
    angledown1.style.cssText = 'display: none'
    angledown2.style.cssText = 'display: none'
})


let longpar = document.querySelectorAll('.longpar')

longpar.forEach(r => {
    if(r.clientHeight > 85){
        r.classList.toggle('paramnone')
        r.lastElementChild.classList.toggle('paramnone')
        r.addEventListener('click', function(){
            r.classList.toggle('paramshow')
            r.lastElementChild.classList.toggle('paramshow')
        })
    }
});
