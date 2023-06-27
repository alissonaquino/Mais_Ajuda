document.addEventListener('DOMContentLoaded', function() {
    let inicial = document.querySelector('[wm-caminho="./arquivoshtml/desemprego.html"]');
    if (inicial) {
      inicial.click();
    }
  });

document.querySelector('.btn-exp').addEventListener('click',function(){
    this.classList.toggle('btn-exp')
    this.classList.toggle('btn-exp-clicado')
    document.querySelector('aside').classList.toggle('hide-aside')
})

document.querySelectorAll('[wm-nav]').forEach(link => {
    link.onclick = function(){
        let tipo = this.getAttribute('wm-nav')
        if(tipo == "desemprego"){
            temaDesemprego()
        }
        else if(tipo == "financeiro"){
            temaFinanceiro()
        }
        else{
            temaAjuda()
        }
        let conteudo = document.querySelector('.conteudo')
        fetch(link.getAttribute('wm-caminho'))
            .then(resp => resp.text())
            .then(html => conteudo.innerHTML = html)
            .catch(err => console.log)
        console.log(link.getAttribute('wm-caminho'))
        if(link.getAttribute('wm-caminho') == './arquivoshtml/verVagas.php'){
            let importCss = document.createElement('link');
            importCss.rel = 'stylesheet';   
            importCss.href = 'principal/content/verVagas.css';
            document.head.appendChild(importCss); 

            let importJs = document.createElement('script');
            importJs.src = 'principal/content/verVagas.js';
            
            setTimeout(()=>{
                document.head.appendChild(importJs); 

            },100)  
        } 
        else if(link.getAttribute('wm-caminho') == './arquivoshtml/anunciarVaga.html'){
            let importCss = document.createElement('link');
            importCss.rel = 'stylesheet';   
            importCss.href = 'principal/content/anunciarVaga.css';
            document.head.appendChild(importCss); 

            let importJs = document.createElement('script');
            importJs.src = 'principal/content/anunciarVaga.js';
            
            setTimeout(()=>{
                document.head.appendChild(importJs); 

            },100)  
        }  
        else if(link.getAttribute('wm-caminho') == './arquivoshtml/precisoDeAjuda.php'){
            let importCss = document.createElement('link');
            importCss.rel = 'stylesheet';   
            importCss.href = 'principal/content/precisoDeAjuda.css';
            document.head.appendChild(importCss); 

            let importJs = document.createElement('script');
            importJs.src = 'principal/content/precisoDeAjuda.js';
            
            setTimeout(()=>{
                document.head.appendChild(importJs); 

            },100)  
        }
        else if(link.getAttribute('wm-caminho') == './arquivoshtml/queroAjudar.html'){
            let importCss = document.createElement('link');
            importCss.rel = 'stylesheet';   
            importCss.href = 'principal/content/queroAjudar.css';
            document.head.appendChild(importCss); 
        }  
    }
})



function temaFinanceiro(){
    if(!document.querySelector('header').classList.contains('header-fin')){
        document.querySelector('body').classList.add('body')
        setTimeout(()=>{
            document.querySelector('body').classList.remove('body')
        },1000)
    }

    if(document.querySelector('header').classList.contains('header-aju')){
        document.querySelector('header').classList.remove('header-aju')
        document.querySelector('aside').classList.remove('aside-aju')
    }
    document.querySelector('header').classList.add('header-fin')
    document.querySelector('aside').classList.add('aside-fin')
}

function temaDesemprego(){
    if(!document.querySelector('header').classList.contains('header-des')){
        document.querySelector('body').classList.add('body')
        setTimeout(()=>{
            document.querySelector('body').classList.remove('body')
        },1000)
    }

    if(document.querySelector('header').classList.contains('header-fin')){
        document.querySelector('header').classList.remove('header-fin')
        document.querySelector('aside').classList.remove('aside-fin')
    }
    else if(document.querySelector('header').classList.contains('header-aju')){
        document.querySelector('header').classList.remove('header-aju')
        document.querySelector('aside').classList.remove('aside-aju')
    }

}

function temaAjuda(){
    if(!document.querySelector('header').classList.contains('header-aju')){
        document.querySelector('body').classList.add('body')
        setTimeout(()=>{
            document.querySelector('body').classList.remove('body')
        },1000)
    }

    if(document.querySelector('header').classList.contains('header-fin')){
        document.querySelector('header').classList.remove('header-fin')
        document.querySelector('aside').classList.remove('aside-fin')

        document.querySelector('body').classList.add('body')
        setTimeout(()=>{
            document.querySelector('body').classList.remove('body')
        },1000)
    }
    document.querySelector('header').classList.add('header-aju')
    document.querySelector('aside').classList.add('aside-aju')
}

