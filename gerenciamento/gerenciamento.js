document.getElementById('btnExtraExp').addEventListener('click', () => {
    document.getElementById('btnExtra').classList.toggle('modal-btn-extra')
})



document.querySelectorAll('[wm-button]').forEach(btn => {
    btn.onclick = function(){
        let classe = this.getAttribute('wm-tipe')
        
        document.querySelectorAll('[wm-classes]').forEach(element => {

            element.style.display = 'none'
        })
        
        document.querySelector(`main > .${classe} `).style.display = 'flex'
    }
})