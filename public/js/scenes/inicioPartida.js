export class InicioPartida extends Phaser.Scene {
    constructor() {
        super({ key: "InicioPartida" });
    }

    preload() {
        this.load.image("fotoPerfil", fotoPerfil);
        this.load.image("botonEmpezar", "img/botonEmpezar.png");
        this.load.image("botonContinuar", "img/botonContinuar.png");
        this.load.image("botonPlantarse", "img/botonPlantarse.png");
        this.load.image("separador", "img/barrauno.png");
    }

    create() {
        this.scene.get("Fondo").update();
        this.logo = this.add.image(350, 250, "fotoPerfil");
        this.logo.setDisplaySize(250, 250);
        var rect1 = this.add.rectangle(1200, 0, 1000, 2000, 0x7777ff, 0.95);
        var rect2 = this.add.rectangle(0, 1500, 1400, 2000, 0x7777ff, 0.8);
        this.barra = this.add.image(1150, 370, "separador");
        this.barra.setScale(1.1);
        if (game.registry.get("pregunta") > 0) {
            if (game.registry.get("saltoPregunta") == true) {
                this.botonPlantarse = this.add.image(
                    100,
                    700,
                    "botonPlantarse"
                );
                this.botonPlantarse.setScale(0.2);
                this.botonEmpezar = this.add.image(350, 630, "botonContinuar");
                this.botonEmpezar.setScale(0.45);
                this.add
                    .text(100, 50, "¡Comodín de cambio de pregunta!", {
                        fontFamily: "Helvetica",
                        fontSize: "40px",
                        color: "#fff",
                        fontStyle: "normal",
                    })
                    .setStroke("#000", 3);
            } else {
                this.botonPlantarse = this.add.image(
                    100,
                    700,
                    "botonPlantarse"
                );
                this.botonPlantarse.setScale(0.2);
                this.botonEmpezar = this.add.image(350, 630, "botonContinuar");
                this.botonEmpezar.setScale(0.45);
                this.add
                    .text(125, 50, "¡Respuesta correcta!", {
                        fontFamily: "Helvetica",
                        fontSize: "48px",
                        color: "#fff",
                        fontStyle: "normal",
                    })
                    .setStroke("#000", 3);
            }
        } else {
            if (game.registry.get("saltoPregunta") == true) {
                this.botonPlantarse = this.add.image(
                    100,
                    700,
                    "botonPlantarse"
                );
                this.botonPlantarse.setScale(0.2);
                this.botonEmpezar = this.add.image(350, 630, "botonContinuar");
                this.botonEmpezar.setScale(0.45);
                this.add
                    .text(50, 50, "¡Comodín de cambio de pregunta!", {
                        fontFamily: "Helvetica",
                        fontSize: "40px",
                        color: "#fff",
                        fontStyle: "normal",
                    })
                    .setStroke("#000", 3);
            } else {
                this.botonEmpezar = this.add.image(350, 630, "botonEmpezar");
                this.botonEmpezar.setScale(0.45);
                this.add
                    .text(190, 50, usuario, {
                        fontFamily: "Helvetica",
                        fontSize: "48px",
                        color: "#fff",
                        fontStyle: "normal",
                    })
                    .setStroke("#000", 3);
            }
        }

        this.botonEmpezar.setInteractive();
        this.botonEmpezar.on(
            "pointerdown",
            function (event) {
                this.scene.start("Pregunta");
            },
            this
        );
        if (this.botonPlantarse) {
            this.botonPlantarse.setInteractive();
            this.botonPlantarse.on(
                "pointerdown",
                function (event) {
                    this.enviarDatos();
                },
                this
            );
        }

        this.añadirTexto(this);
    }

    enviarDatos() {
        var puntuacion = {
            user_id: usuarioID,
            tiempo: game.registry.get("tiempo"),
            puntuacion: game.registry.get("puntuacion"),
            dificultad: game.registry.get("dificultad"),
        };

        var self = this;

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/juego-subir",
            data: puntuacion,
            success: function (data) {
                // Aquí usamos self en lugar de this
                if (data.user_id) {
                    self.finJuego();
                } else {
                    self.scene.start("opciones");
                }
            },
        });
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
                    element + " pts",
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
                    element + " pts",
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

    finJuego() {
        this.scene.start("FinalPartida");
    }
}
