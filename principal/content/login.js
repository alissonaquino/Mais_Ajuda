document.querySelector('[wm-cadastrar]').addEventListener('click',function(){
    document.querySelector('.modal-cadastro').style.display = 'flex';
    document.querySelector('.content-modal').classList.remove('animate__animated', 'animate__fadeOutDown')
    document.querySelector('.content-modal').classList.add('animate__animated', 'animate__fadeInUp')
    document.querySelector('.modal-cadastro').classList.toggle('modal-cadastro-aux')

    document.querySelector('.btn-fechar').addEventListener('click', ()=>{
        document.querySelector('.content-modal').classList.remove('animate__animated', 'animate__fadeInUp')
        document.querySelector('.content-modal').classList.add('animate__animated', 'animate__fadeOutDown')

        setTimeout(()=>{
            document.querySelector('.modal-cadastro').classList.toggle('modal-cadastro-aux')
            document.querySelector('.modal-cadastro').style.display = 'none';
        }, 700)
    })

})