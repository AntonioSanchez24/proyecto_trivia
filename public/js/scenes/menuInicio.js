export class menuInicio extends Phaser.Scene {
    constructor() {
        super({ key: "menuInicio" });
    }

    preload() {
        this.load.image("logo", "img/logoJuego.png");
        this.load.image("botonInicio", "img/botonInicio.png");
        this.load.image("botonOpciones", "img/botonOpciones.png");
        if (typeof game.registry.get("dificultad") == "undefined") {
            this.dificultad = 2;
            game.registry.set("dificultad", this.dificultad);
            game.registry.set("dificultadText", "Normal");

        } else {
            this.dificultad = game.registry.get("dificultad");
        }
        game.registry.set("pregunta", 0);
        game.registry.set("puntuacion", 0);
        game.registry.set("tiempo", 0);
    }

    create() {
        this.logo = this.add.image(750, 100, "logo");
        this.logo.setScale(0.5);
        this.botonInicio = this.add.image(750, 300, "botonInicio");
        this.botonInicio.setScale(0.5);
        this.botonOpciones = this.add.image(750, 500, "botonOpciones");
        this.botonOpciones.setScale(0.5);
        this.botonInicio.setInteractive();
        this.botonInicio.on(
            "pointerdown",
            function (event) {
                Livewire.emit("nuevaPregunta", game.registry.get("pregunta"));

                window.livewire.on("preguntaRecogida", (pregunta) => {
                    preguntaQuery = pregunta;
                });

                this.scene.start("InicioPartida");
            },
            this
        );

        this.botonOpciones.setInteractive();
        this.botonOpciones.on(
            "pointerdown",
            function (event) {
                // ...
                this.scene.start("Opciones");
            },
            this
        );
    }
}
