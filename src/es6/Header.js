/** Class */
export default class Header {
    constructor() {
        this.header = document.querySelector("header")
        this.menu = document.querySelector(".menu")
        this.nav = this.header.querySelector("nav")

        console.log(this.header)
        this.initHeaderClick()
        this.removeBigScreen()
    }
    initHeaderClick() {
        this.menu.addEventListener('click', () => {
            this.nav.classList.toggle('nav-active')
        })
    }
    removeBigScreen() {
        console.log('resize')
        window.addEventListener('resize', () => {
            if (window.innerWidth > 789 && this.nav.classList.contains('nav-active')) {
                this.nav.classList.remove('nav-active')
            }
        })
    }
}
