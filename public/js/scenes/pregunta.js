export class Pregunta extends Phaser.Scene {
    constructor() {
        super({ key: "Pregunta" });
    }

    preload() {
        this.load.video("background", "mp4/fondoFix.mp4", false, true);
        this.load.image("logo", fotoPerfil);
        this.load.image("botonEmpezar", "img/botonEmpezar.png");
        this.load.image("preguntaTemplate", "img/pregunta.png");
        this.load.image("respuestaTemplate", "img/preguntaTemplate.png");
        this.load.image("respuestaTension", "img/respuestaCor.png");
        this.load.image("respuestaCorrecta", "img/respuestaCorBien.png");
        this.load.image("respuestaIncorrecta", "img/respuestaCorMal.png");
    }

    create() {
        this.initialTime = 120 / this.game.registry.get("dificultad");
        this.evento = this.time.addEvent({ delay: 1000, callback: this.onEvent, callbackScope: this, loop: true });
        this.fondoFix = this.add.video(600, 350, "background");
        this.fondoFix.play(true);
        this.cuenta = this.add.text(32, 32, this.formatTime(this.initialTime),{
			fontFamily: 'Helvetica',
			fontSize: '48px',
			color: '#fff',
			fontStyle: 'normal',
			strokeThickness: 2
		});
        this.preguntaTemplate = this.add.image(0, 0, "preguntaTemplate");
        this.respuestaTemplate1 = this.add.image(0, 0, "preguntaTemplate");
        this.respuestaTemplate1.setScale(0.45);
        this.respuestaTemplate2 = this.add.image(0, 0, "preguntaTemplate");
        this.respuestaTemplate2.setScale(0.45);
        this.respuestaTemplate3 = this.add.image(0, 0, "preguntaTemplate");
        this.respuestaTemplate3.setScale(0.45);
        this.respuestaTemplate4 = this.add.image(0, 0, "preguntaTemplate");
        this.respuestaTemplate4.setScale(0.45);
        this.pregunta = this.add.text(
            0,
            0,
            preguntasFacil[game.registry.get("pregunta")].pregunta,
            {
                fontFamily: "Helvetica",
                fontSize: "42px",
                color: "#fff",
                fontStyle: "normal",
                align: "center",
                wordWrap: {
                    width: this.preguntaTemplate.getWidth * 0.75,
                },
                strokeThickness: 2,
            }
        );
        this.preguntaContainer = this.add.container(785, 210, [
            this.preguntaTemplate,
            this.pregunta.setOrigin(0.5),
        ]);
        this.añadirTexto(this);
        let textoA = this.preguntaContainerA.list[1];
        let textoB = this.preguntaContainerB.list[1];
        let textoC = this.preguntaContainerC.list[1];
        let textoD = this.preguntaContainerD.list[1];

        this.fitToContainer(textoA, this.preguntaContainerA);
        this.fitToContainer(textoB, this.preguntaContainerB);
        this.fitToContainer(textoC, this.preguntaContainerC);
        this.fitToContainer(textoD, this.preguntaContainerD);
        this.fitToContainer(this.preguntaContainer[1], this.preguntaContainer);
    }

    fitToContainer(text, container) {
        var containerWidth = container.width;
        var containerHeight = container.height;
        var textWidth = text.getWidth();
        var textHeight = text.getHeight();
    
        if (textWidth > containerWidth || textHeight > containerHeight) {
            var scaleFactor = Math.min(
                containerWidth / textWidth,
                containerHeight / textHeight
            );
    
            text.setFontSize(scaleFactor * parseInt(text.style.fontSize));
        }
    }

    añadirTexto(scene) {
        var datos =
            preguntasFacil[game.registry.get("pregunta")]
                .respuestas_incorrectas;
        var respuestas = datos.split('","');
        respuestas[0] = respuestas[0].substr(2);
        respuestas[2] = respuestas[2].substring(0, respuestas[2].length - 2);
        respuestas[3] =
            preguntasFacil[game.registry.get("pregunta")].respuesta_correcta;
        var respuestaA = Math.floor(Math.random() * respuestas.length);
        console.log(respuestaA);
        this.preguntaContainerA = this.add.container(385, 510, [
            this.respuestaTemplate1,
            this.add
                .text(0, 0, "A. " + respuestas[respuestaA], {
                    fontFamily: "Helvetica",
                    fontSize: "42px",
                    color: "#fff",
                    fontStyle: "normal",
                    align: "center",
                    wordWrap: {
                        width: this.preguntaTemplate.getWidth * 0.75,
                    },
                    strokeThickness: 2,
                })
                .setOrigin(0.5),
        ]);

        this.preguntaContainerA.setSize(
            this.preguntaContainerA.list[0].displayWidth,
            this.preguntaContainerA.list[0].displayHeight
        );

        respuestas.splice(respuestaA, 1);
        var respuestaB = Math.floor(Math.random() * respuestas.length);

        this.preguntaContainerB = this.add.container(1185, 510, [
            this.respuestaTemplate2,
            this.add
                .text(0, 0, "B. " + respuestas[respuestaB], {
                    fontFamily: "Helvetica",
                    fontSize: "42px",
                    color: "#fff",
                    fontStyle: "normal",
                    align: "center",
                    wordWrap: {
                        width: this.preguntaTemplate.getWidth * 0.75,
                    },
                    strokeThickness: 2,
                })
                .setOrigin(0.5),
        ]);

        this.preguntaContainerB.setSize(
            this.preguntaContainerB.list[0].displayWidth,
            this.preguntaContainerB.list[0].displayHeight
        );

        respuestas.splice(respuestaB, 1);
        var respuestaC = Math.floor(Math.random() * respuestas.length);

        this.preguntaContainerC = this.add.container(385, 610, [
            this.respuestaTemplate3,
            this.add
                .text(0, 0, "C. " + respuestas[respuestaC], {
                    fontFamily: "Helvetica",
                    fontSize: "42px",
                    color: "#fff",
                    fontStyle: "normal",
                    align: "center",
                    wordWrap: {
                        width: this.preguntaTemplate.getWidth * 0.75,
                    },
                    strokeThickness: 2,
                })
                .setOrigin(0.5),
        ]);

        this.preguntaContainerC.setSize(
            this.preguntaContainerC.list[0].displayWidth,
            this.preguntaContainerC.list[0].displayHeight
        );
        respuestas.splice(respuestaC, 1);

        this.preguntaContainerD = this.add.container(1185, 610, [
            this.respuestaTemplate4,
            this.add
                .text(0, 0, "D. " + respuestas[0], {
                    fontFamily: "Helvetica",
                    fontSize: "42px",
                    color: "#fff",
                    fontStyle: "normal",
                    align: "center",
                    wordWrap: {
                        width: this.preguntaTemplate.getWidth * 0.75,
                    },
                    strokeThickness: 2,
                })
                .setOrigin(0.5),
        ]);

        this.preguntaContainerD.setSize(
            this.preguntaContainerD.list[0].displayWidth,
            this.preguntaContainerD.list[0].displayHeight
        );

        this.preguntaContainerA.setInteractive();

        this.preguntaContainerA.on(
            "pointerdown",
            function (event) {
                this.resolverPregunta(scene, this.preguntaContainerA);
            },
            this
        );

        this.preguntaContainerB.setInteractive();

        this.preguntaContainerB.on(
            "pointerdown",
            function (event) {
                this.resolverPregunta(scene, this.preguntaContainerB);
            },
            this
        );

        this.preguntaContainerC.setInteractive();

        this.preguntaContainerC.on(
            "pointerdown",
            function (event) {
                this.resolverPregunta(scene, this.preguntaContainerC);
            },
            this
        );

        this.preguntaContainerD.setInteractive();

        this.preguntaContainerD.on(
            "pointerdown",
            function (event) {
                this.resolverPregunta(scene, this.preguntaContainerD);
            },
            this
        );
    }

    

    resolverPregunta(scene, pregunta) {
        this.puntuaciones = [
            50,
            250,
            500,
            750,
            1000,
            1500,
            2000,
            5000,
            10000,
            25000,
            50000,
            100000,
            250000,
            500000,
            1000000,
        ];
        var preguntas = [
            this.preguntaContainerA,
            this.preguntaContainerB,
            this.preguntaContainerC,
            this.preguntaContainerD,
        ];

        preguntas.forEach(function (contenedor) {
            contenedor.removeInteractive();
        });
        pregunta.list[0].setTexture("respuestaTension");

        if (
            pregunta.list[1].text.substring(3) ==
            preguntasFacil[game.registry.get("pregunta")].respuesta_correcta
        ) {
            this.evento.paused = true;
            this.time.delayedCall(1000, () => { 
               return pregunta.list[0].setTexture("respuestaCorrecta")}, [], this);

            if (game.registry.get("pregunta") < 14) {
                game.registry.set(
                    "pregunta",
                    game.registry.get("pregunta") + 1
                );

                var base = 120 / this.game.registry.get("dificultad");
                game.registry.set("tiempo", (parseInt(game.registry.get("tiempo")) + parseInt((this.initialTime - base)* -1)));
                
                    
                game.registry.set( "puntuacion", (parseInt(game.registry.get("puntuacion")) + parseInt(this.puntuaciones[game.registry.get("pregunta")]) + parseInt(base - this.initialTime)));
                
                console.log(game.registry.get("puntuacion"))

                this.time.delayedCall(1000, () => { 
                    return this.time.delayedCall(1000, () => { 
                        return this.siguientePregunta()}, [], this);}, [], this);
                
            } else {
                this.enviarDatos();
            }

        } else {
            setTimeout(
                pregunta.list[0].setTexture("respuestaIncorrecta"),
                5000
            );
            this.scene.start("menuInicio");
        }
    }

    siguientePregunta(){
        this.scene.start("InicioPartida");
    }

    formatTime(seconds){
        // Minutes
        var minutes = Math.floor(seconds/60);
        // Seconds
        var partInSeconds = seconds%60;
        // Adds left zeros to seconds
        partInSeconds = partInSeconds.toString().padStart(2,'0');
        // Returns formated time
        return `${minutes}:${partInSeconds}`;
    }
    
    
    onEvent ()
    {
        if(this.initialTime == 0){
            this.scene.start("menuInicio");

        }else{
            this.initialTime -= 1; // One second
            this.cuenta.setText(this.formatTime(this.initialTime));
        }
      
    }

    enviarDatos(){
        var puntuacion = {
            "user_id":  usuarioID,
            "tiempo":  game.registry.get("tiempo"),
            "puntuacion":  game.registry.get("puntuacion"),
            "dificultad": game.registry.get("dificultad"),
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
            type: "POST",
            url: '/juego-subir' ,
            data: puntuacion,
            success: function(data) {
                if (data == "success") {
                    this.scene.start("menuInicio");
                } else if (data == "error") {
                    this.scene.start("opciones");
                }
            }
        });

    }
    

}
