/** Class */
export default class ParallaxHome {
    constructor() {
        this.image = document.querySelector('.landing__img')
        this.imageWidth = this.image.offsetWidth /2
        this.innerHeight = window.innerHeight / 2
        this.innerWidth = window.innerWidth / 2- this.imageWidth
        console.log(this.imageWidth)

        this.initParallax()
    }
    initParallax() {
        window.addEventListener('mousemove', (e) => {
            this.image.style.transform = `translate3d(${(this.innerWidth - e.screenX)/15}px, ${(this.innerHeight - e.screenY)/15}px, 0)`
        })
    }
}
