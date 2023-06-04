export class InicioPartida extends Phaser.Scene {
    constructor() {
        super({ key: "InicioPartida" });
    }

    preload() {
        this.load.video("background", "mp4/fondoFix.mp4", false, true);
        this.load.image("logo", fotoPerfil);
        this.load.image("botonEmpezar", "img/botonEmpezar.png");
        this.load.image("botonContinuar", "img/botonContinuar.png");
        this.load.image("separador", "img/barrauno.png");
    }

    create() {
        this.fondoFix = this.add.video(600, 350, "background");
        this.fondoFix.play(true);
        this.logo = this.add.image(350, 300, "logo");
        this.logo.setSize(600, 600);
        var rect1 = this.add.rectangle(1200, 0, 1000, 2000, 0x7777ff, 0.95);
        var rect2 = this.add.rectangle(0, 1500, 1400, 2000, 0x7777ff, 0.8);
        this.barra = this.add.image(1150, 370, "separador");
        this.barra.setScale(1.1);
        if (game.registry.get("pregunta") > 0) {
            this.botonEmpezar = this.add.image(350, 630, "botonContinuar");
            this.botonEmpezar.setScale(0.45);
            this.add.text(125, 50, "¡Respuesta correcta!", {
                fontFamily: "Helvetica",
                fontSize: "48px",
                color: "#fff",
                fontStyle: "normal",
                strokeThickness: 2,
            });
        } else {
            this.botonEmpezar = this.add.image(350, 630, "botonEmpezar");
            this.botonEmpezar.setScale(0.45);
            this.add.text(225, 50, usuario, {
                fontFamily: "Helvetica",
                fontSize: "48px",
                color: "#fff",
                fontStyle: "normal",
                strokeThickness: 2,
            });
        }

        this.botonEmpezar.setInteractive();
        this.botonEmpezar.on(
            "pointerdown",
            function (event) {
                // ...
                this.scene.start("Pregunta");
            },
            this
        );
        this.añadirTexto(this);
    }

    añadirTexto(scene) {
        var puntuaciones = [
            "50",
            "250",
            "500",
            "750",
            "1000",
            "1500",
            "2000",
            "5000",
            "10000",
            "25000",
            "50000",
            "100000",
            "250000",
            "500000",
            "1000000",
        ];
        var checkPregunta = 0;
        puntuaciones.forEach(function (element) {
            if (checkPregunta == game.registry.get("pregunta")) {
                scene.add.rectangle(
                    1180,
                    742 - (checkPregunta + 1) * 47,
                    900,
                    50,
                    0xff7700,
                    0.8
                );
                var texto1 = scene.add.text(
                    1375,
                    725 - (checkPregunta + 1) * 47,
                    element + "€",
                    {
                        fontFamily: "Helvetica",
                        fontSize: "30px",
                        color: "00xeee1ba",
                        fontStyle: "normal",
                        strokeThickness: 0,
                    }
                );
                var texto2 = scene.add.text(
                    775,
                    725 - (checkPregunta + 1) * 47,
                    checkPregunta + 1,
                    {
                        fontFamily: "Helvetica",
                        fontSize: "30px",
                        color: "00xeee1ba",
                        fontStyle: "normal",
                        strokeThickness: 0,
                    }
                );
            } else {
                scene.add.text(
                    1375,
                    725 - (checkPregunta + 1) * 47,
                    element + "€",
                    {
                        fontFamily: "Helvetica",
                        fontSize: "30px",
                        color: "#fff",
                        fontStyle: "normal",
                        strokeThickness: 0,
                    }
                );
                scene.add.text(
                    775,
                    725 - (checkPregunta + 1) * 47,
                    checkPregunta + 1,
                    {
                        fontFamily: "Helvetica",
                        fontSize: "30px",
                        color: "#fff",
                        fontStyle: "normal",
                        strokeThickness: 0,
                    }
                );
            }
            checkPregunta++;
        }, this);
    }
}
