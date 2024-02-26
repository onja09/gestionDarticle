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