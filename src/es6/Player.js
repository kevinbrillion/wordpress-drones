/** Class */
export default class Player {
    /**
     *
     */
    constructor() {
        this.video = document.querySelector('.video')
        if (this.video) {
          this.pausePlay()
        }
    }
    pausePlay() {
        this.video.addEventListener('click', () => {
            console.log('click')
            if (this.video.paused) {
                this.video.play()
            }
            else {
                this.video.pause()
            }
        })
    }
}
