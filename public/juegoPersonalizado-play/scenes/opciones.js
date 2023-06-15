export class Opciones extends Phaser.Scene {
    constructor() {
        super({ key: "Opciones" });
    }

    preload() {
        this.load.image("logo", "img/logoJuego.png");
        this.load.image("botonInicio", "img/botonInicio.png");
        this.load.image("botonVolver", "img/botonVolver.png");
        this.load.image("botonFacil", "img/botonFacil.png");
        this.load.image("botonNormal", "img/botonNormal.png");
        this.load.image("botonDificil", "img/botonDificil.png");
        this.load.image("botonAudio", "img/botonAudio.png");
        this.load.image("botonAudio2", "img/botonAudio2.png");

        if (typeof game.registry.get("dificultad") == "undefined") {
            this.dificultad = 2;
            this.dificultadText = "Normal";
        } else {
            this.dificultad = game.registry.get("dificultad");
        }
    }

    create() {
        this.botonAudio = this.add.image(100, 100, "botonAudio");
        this.botonAudio.setScale(0.15);
        this.botonAudio2 = this.add.image(100, 100, "botonAudio2");
        this.botonAudio2.setScale(0.15);
        this.botonAudio2.setVisible(false);
        this.botonAudio2.setInteractive();
        this.botonAudio2.on(
            "pointerdown",
            function (event) {
                this.botonAudio2.setVisible(false);
                this.botonAudio.setVisible(true);
                this.toggleSound();
            },
            this
        );
        this.botonAudio.setInteractive();
        this.botonAudio.on(
            "pointerdown",
            function (event) {
                this.botonAudio.setVisible(false);
                this.botonAudio2.setVisible(true);
                this.toggleSound();
            },
            this
        );
        this.logo = this.add.image(750, 100, "logo");
        this.logo.setScale(0.5);
        this.botonFacil = this.add.image(200, 250, "botonFacil");
        this.add
            .text(
                400,
                225,
                "7 preguntas fáciles, 5 preguntas normales, 3 difíciles",
                {
                    fontFamily: "Helvetica",
                    fontSize: "48px",
                    color: "#fff",
                    fontStyle: "normal",
                }
            )
            .setStroke("#000", 3);
        this.botonNormal = this.add.image(200, 450, "botonNormal");
        this.add
            .text(
                400,
                425,
                "5 preguntas fáciles, 5 preguntas normales, 5 difíciles",
                {
                    fontFamily: "Helvetica",
                    fontSize: "48px",
                    color: "#fff",
                    fontStyle: "normal",
                }
            )
            .setStroke("#000", 3);
        this.botonDificil = this.add.image(200, 650, "botonDificil");
        this.add
            .text(
                400,
                625,
                "3 preguntas fáciles, 5 preguntas normales, 7 difíciles",
                {
                    fontFamily: "Helvetica",
                    fontSize: "48px",
                    color: "#fff",
                    fontStyle: "normal",
                }
            )
            .setStroke("#000", 3);
        let scale = 0.35;
        this.botonFacil.setScale(scale);
        this.botonNormal.setScale(scale);
        this.botonDificil.setScale(scale);
        this.botonInicio5 = this.add.image(1200, 100, "botonVolver");
        this.botonInicio5.setScale(0.25);
        this.botonFacil.setInteractive();
        this.botonFacil.on(
            "pointerdown",
            function (event) {
                this.botonFacil.setScale(scale * 1.2);
                this.botonNormal.setScale(scale);
                this.botonDificil.setScale(scale);
                this.dificultad = 1;
                this.dificultadText = "Fácil";
            },
            this
        );

        this.botonNormal.setInteractive();
        this.botonNormal.on(
            "pointerdown",
            function (event) {
                this.botonFacil.setScale(scale);
                this.botonNormal.setScale(scale * 1.2);
                this.botonDificil.setScale(scale);
                this.dificultad = 2;
                this.dificultadText = "Normal";
            },
            this
        );

        this.botonDificil.setInteractive();
        this.botonDificil.on(
            "pointerdown",
            function (event) {
                this.botonFacil.setScale(scale);
                this.botonNormal.setScale(scale);
                this.botonDificil.setScale(scale * 1.2);
                this.dificultad = 3;
                this.dificultadText = "Dificil";
            },
            this
        );
        this.botonInicio5.setInteractive();
        this.botonInicio5.on(
            "pointerdown",
            function (event) {
                game.registry.set("dificultad", this.dificultad);
                game.registry.set("dificultadText", this.dificultadText);
                this.scene.start("menuInicio");
            },
            this
        );
    }

    toggleSound() {
        this.sound.mute = !this.sound.mute;
    }
}
