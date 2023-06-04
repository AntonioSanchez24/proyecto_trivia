export class Opciones extends Phaser.Scene {
    constructor() {
        super({ key: "Opciones" });
    }

    preload() {
        this.load.video("background", "mp4/fondoFix.mp4", false, true);
        this.load.image("gameover", "img/logo.png");
        this.load.image("botonInicio", "img/botonInicio.png");
        this.load.image("botonVolver", "img/botonVolver.png");
        this.load.image("botonFacil", "img/botonFacil.png");
        this.load.image("botonNormal", "img/botonNormal.png");
        this.load.image("botonDificil", "img/botonDificil.png");

        if (typeof game.registry.get("dificultad") == "undefined") {
            this.dificultad = 2;
        } else {
            this.dificultad = game.registry.get("dificultad");
        }
    }

    create() {
        this.fondoFix = this.add.video(600, 350, "background");
        this.fondoFix.play(true);
        this.gameoverImage = this.add.image(750, 100, "gameover");
        this.gameoverImage.setScale(0.25);
        this.botonFacil = this.add.image(200, 250, "botonFacil");
        this.botonFacil.setScale(0.5);
        this.add.text(400, 225, '7 preguntas fáciles, 5 preguntas normales, 3 difíciles', {
			fontFamily: 'Helvetica',
			fontSize: '48px',
			color: '#fff',
			fontStyle: 'normal',
			strokeThickness: 2
		});
        this.botonNormal = this.add.image(200, 450, "botonNormal");
        this.botonNormal.setScale(0.5);
        this.add.text(400, 425, '5 preguntas fáciles, 5 preguntas normales, 5 difíciles', {
			fontFamily: 'Helvetica',
			fontSize: '48px',
			color: '#fff',
			fontStyle: 'normal',
			strokeThickness: 2
		});
        this.botonDificil = this.add.image(200, 650, "botonDificil");
        this.botonDificil.setScale(0.5);
        this.add.text(400, 625, '3 preguntas fáciles, 5 preguntas normales, 7 difíciles', {
			fontFamily: 'Helvetica',
			fontSize: '48px',
			color: '#fff',
			fontStyle: 'normal',
			strokeThickness: 2
		});
        this.botonInicio5 = this.add.image(1200, 100, "botonVolver");
        this.botonInicio5.setScale(0.25);

        this.botonFacil.setInteractive();
        this.botonFacil.on(
            "pointerdown",
            function (event) {
                this.dificultad = 1;
                alert("Facil!");
            },
            this
        );

        this.botonNormal.setInteractive();
        this.botonNormal.on(
            "pointerdown",
            function (event) {
                this.dificultad = 2;
                alert("Normal!");
            },
            this
        );

        this.botonDificil.setInteractive();
        this.botonDificil.on(
            "pointerdown",
            function (event) {
                this.dificultad = 3;
                alert("Dificil!");
            },
            this
        );
        this.botonInicio5.setInteractive();
        this.botonInicio5.on(
            "pointerdown",
            function (event) {
                game.registry.set("dificultad", this.dificultad);
                alert(game.registry.get("dificultad") + " Volver.");
                this.scene.start("menuInicio");
            },
            this
        );
    }
}
