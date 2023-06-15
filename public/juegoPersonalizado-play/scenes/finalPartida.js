export class FinalPartida extends Phaser.Scene {
    constructor() {
        super({ key: "FinalPartida" });
    }

    preload() {
        this.load.image("fotoPerfil", fotoPerfil);
        this.load.image("botonVolver", "img/botonVolver.png");
        this.load.image("separador", "img/barrauno.png");
        this.load.video("fondoGanar", "mp4/fondoGanar.mp4", true);
        this.load.video("fondoPerder", "mp4/fondoPerder2.mp4", true);
    }

    create() {
        if(this.game.registry.get("ganarPartida") == true){
            this.scene.get("Fondo").updateVictoria();
            let fondoScene = this.scene.get("Fondo");
        fondoScene.video = this.add.video(600, 350, "fondoGanar");
        fondoScene.video.play('true');
        this.fotoPerfil = this.add.image(350, 250, "fotoPerfil");
        this.fotoPerfil.setDisplaySize(250, 250);
        var rect1 = this.add.rectangle(1200, 0, 1000, 2000, 0x7777ff, 0.95);
        var rect2 = this.add.rectangle(0, 1500, 1400, 2000, 0x7777ff, 0.8);
        this.barra = this.add.image(1150, 370, "separador");
        this.barra.setScale(1.1);
        this.botonEmpezar = this.add.image(350, 630, "botonVolver");
        this.botonEmpezar.setScale(0.45);
        this.add.text(200, 50, "¡Felicidades!", {
            fontFamily: "Helvetica",
            fontSize: "48px",
            color: "#fff",
            fontStyle: "normal",
        }).setStroke("#000", 3);

        this.add.text(100, 385, "Tu puntuación: " + game.registry.get("puntuacion"), {
            fontFamily: "Helvetica",
            fontSize: "48px",
            color: "#fff",
            fontStyle: "normal",
        }).setStroke("#000", 3);
        this.add.text(150, 450, "Dificultad: " + game.registry.get("dificultadText"), {
            fontFamily: "Helvetica",
            fontSize: "48px",
            color: "#fff",
            fontStyle: "normal",
        }).setStroke("#000", 3);

        this.botonEmpezar.setInteractive();
        this.botonEmpezar.on(
            "pointerdown",
            function (event) {
                // ...
                location.reload();             
            },
            this
        );
        this.añadirTexto(this);

        } else{
            this.scene.get("Fondo").updateDerrota();
            let fondoScene = this.scene.get("Fondo");
        fondoScene.video = this.add.video(100, 100, "fondoPerder");
        fondoScene.video.setScale(2);
        fondoScene.video.play('true');
        this.fotoPerfil = this.add.image(350, 250, "fotoPerfil");
        this.fotoPerfil.setDisplaySize(250, 250);
        var rect1 = this.add.rectangle(1200, 0, 1000, 2000, 0x7777ff, 0.95);
        var rect2 = this.add.rectangle(0, 1500, 1400, 2000, 0x7777ff, 0.8);
        this.barra = this.add.image(1150, 370, "separador");
        this.barra.setScale(1.1);
        this.botonEmpezar = this.add.image(350, 630, "botonVolver");
        this.botonEmpezar.setScale(0.45);
        this.add.text(200, 50, "¡Mala suerte!", {
            fontFamily: "Helvetica",
            fontSize: "48px",
            color: "#fff",
            fontStyle: "normal",
        }).setStroke("#000", 3);

        this.add.text(100, 385, "Tu puntuación: " + game.registry.get("puntuacion"), {
            fontFamily: "Helvetica",
            fontSize: "48px",
            color: "#fff",
            fontStyle: "normal",
        }).setStroke("#000", 3);
        this.add.text(150, 450, "Dificultad: " + game.registry.get("dificultadText"), {
            fontFamily: "Helvetica",
            fontSize: "48px",
            color: "#fff",
            fontStyle: "normal",
        }).setStroke("#000", 3);

        this.botonEmpezar.setInteractive();
        this.botonEmpezar.on(
            "pointerdown",
            function (event) {
                location.reload();             
            },
            this
        );
        this.añadirTexto(this);

        }
        
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
}
