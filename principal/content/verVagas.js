document.querySelectorAll('[wm-next]').forEach(link => {
    link.onclick = function(){
        let classe = this.getAttribute('wm-next')

        document.querySelector('.view-vagas').classList.toggle(classe)
    }
})

document.querySelectorAll('[wm-prev]').forEach(link => {
    link.onclick = function(){
        let classe = this.getAttribute('wm-prev')
        
        document.querySelector('.view-vagas').classList.toggle(classe)
    }
})


document.querySelectorAll('.card-button').forEach(card => {
    card.onclick = function(){
        let id = this.parentElement.getAttribute('wm-id-vaga')
        document.getElementById('invisivel').innerHTML = "<input type='hidden' name='id_vaga' value='"+id+"'>"
        //alert(id)
        document.querySelector('.modal-cadastro').style.display = 'block'
    }
})

document.querySelector('.modal-anuncio-vaga > button').addEventListener('click',()=>{
    document.querySelector('.modal-cadastro').style.display = 'none'
})