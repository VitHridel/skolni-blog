let hide = document.getElementById('news')

let articles = document.querySelectorAll('.clicked')

function expand() {
    let element = document.getElementById(this.id)
    if (!element.parentNode.classList.contains('active')) {
    element.parentNode.classList.add('active')
    element.parentNode.style.cursor = 'initial'
    let button = element.parentNode.lastElementChild
    button.style.display = 'block'
    }
}

articles.forEach(article => {article.addEventListener('click', expand)})

let upBtns = document.querySelectorAll('.up-btn')

function narrow() {
    let showLess = document.getElementById(this.id)
    showLess.style.display = 'none'
    let wholeArticle = showLess.parentNode
    wholeArticle.classList.remove('active')
    wholeArticle.style.cursor = 'pointer'
}

upBtns.forEach(btn => {
    btn.addEventListener('click', narrow)
})

