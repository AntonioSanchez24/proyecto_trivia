export class Fondo extends Phaser.Scene {
    
    constructor() {
        super({ key: "Fondo" });
    }

    preload() {
        this.load.video("backgroundVideo", "mp4/fondoFix.mp4", true);
        this.load.audio("musica1", "mp3/musica_1-5.mp3");
        this.load.audio("musica2", "mp3/musica_6-10.mp3");
        this.load.audio("musica3", "mp3/musica_11-14.mp3");
        this.load.audio("musica4", "mp3/musica_15.mp3");
        this.load.audio("victoria", "mp3/victoria.mp3");
        this.load.audio("derrota", "mp3/derrota.mp3");
    }

    create() {
        this.video = this.add.video(600, 350, "backgroundVideo");
        // Inicia el video.
        this.video.play(true);
        this.miMusica = this.sound.add("musica1");
        this.miMusica.play();
    }

    update() {
        let dificultad = game.registry.get("dificultad");
        let pregunta = game.registry.get("pregunta");
        let nuevaMusica = "";
    
        if (dificultad === 1) {
            if (pregunta > 14) nuevaMusica = "musica4";
            else if (pregunta > 11) nuevaMusica = "musica3";
            else if (pregunta > 6) nuevaMusica = "musica2";
        } else if (dificultad === 2) {
            if (pregunta > 14) nuevaMusica = "musica4";
            else if (pregunta > 9) nuevaMusica = "musica3";
            else if (pregunta > 4) nuevaMusica = "musica2";
        } else if (dificultad === 3) {
            if (pregunta > 14) nuevaMusica = "musica4";
            else if (pregunta > 7) nuevaMusica = "musica3";
            else if (pregunta > 2) nuevaMusica = "musica2";
        }
    
        if (nuevaMusica && nuevaMusica !== this.miMusica.key) {
            this.miMusica.stop();
            this.miMusica = this.sound.add(nuevaMusica);
            this.miMusica.play();
        }   
    }

    updateVictoria(){
        this.miMusica.stop();
            this.miMusica = this.sound.add("victoria");
            this.miMusica.play();
    }

    updateDerrota(){
        this.miMusica.stop();
            this.miMusica = this.sound.add("derrota");
            this.miMusica.play();
    }
    
}
