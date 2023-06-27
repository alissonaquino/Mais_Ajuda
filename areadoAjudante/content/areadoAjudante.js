document.getElementById('btnExtraExp').addEventListener('click', () => {
    document.getElementById('btnExtra').classList.toggle('modal-btn-extra')
})


document.querySelector('[btn-anuncie]').addEventListener('click', () => {
    // let modalC = document.querySelector('.modal-candidatos')
    // if (modalC.style.display == 'flex') {
    //     modalC.style.display = 'none'
    // }
    document.querySelector('.modal-cadastro').style.display = 'flex';
    document.querySelector('.content-modal').classList.remove('animate__animated', 'animate__fadeOutDown')
    document.querySelector('.content-modal').classList.add('animate__animated', 'animate__fadeInUp')
    document.querySelector('.modal-cadastro').classList.toggle('modal-cadastro-aux')

    document.querySelector('.btn-fechar').addEventListener('click', () => {
        document.querySelector('.content-modal').classList.remove('animate__animated', 'animate__fadeInUp')
        document.querySelector('.content-modal').classList.add('animate__animated', 'animate__fadeOutDown')
        document.querySelector('.modal-cadastro').style.display = 'none';
    })
})


document.querySelector('[btn-ajude]').addEventListener('click', () => {
    // let modalC = document.querySelector('.modal-candidatos')
    // if (modalC.style.display == 'flex') {
    //     modalC.style.display = 'none'
    // }
    document.getElementById('btnExtra').classList.toggle('modal-btn-extra')
    document.querySelector('.msg-ajuda').classList.remove('msg-ajuda-2')
    document.querySelector('.msg-ajuda').classList.remove('msg-ajuda-3')
    document.querySelector('.msg-ajuda').classList.add('msg-ajuda')
    document.querySelector('.msg-ajuda').style.display = 'flex';

})

document.querySelectorAll('[wm-next]').forEach(btn => {
    btn.onclick = function () {
        let classe = this.getAttribute('wm-next')
        document.querySelector('.msg-ajuda').classList.toggle(classe)
    }
})


document.querySelectorAll('[wm-prev]').forEach(btn => {
    btn.onclick = function () {
        let classe = this.getAttribute('wm-prev')
        document.querySelector('.msg-ajuda').classList.toggle(classe)
    }
})

document.querySelector('.msg-ajuda>button').addEventListener('click', () => {
    document.querySelector('.msg-ajuda').style.display = 'none';
})

document.querySelectorAll('.card-button').forEach(btn => {
    let modalA = document.querySelector('.msg-ajuda')
    let modalAj = document.querySelector('.modal-cadastro')

    if (modalA.style.display == 'flex') {
        modalA.style.display = 'none'
    }
    else if (modalAj.style.display == 'flex') {
        modalAj.style.display = 'none'
    }

    btn.onclick = function () {

        let id = this.parentNode.getAttribute('wm-id-vaga')
        document.querySelector('.modal-candidatos').style.display = 'flex'
    }
})

document.querySelector('.modal-candidatos>button').addEventListener('click', () => {

    document.querySelector('.modal-candidatos').style.display = 'none';

})