export class InicioPartida extends Phaser.Scene {
    constructor() {
        super({ key: "InicioPartida" });
    }

    preload() {
        this.load.video("background", "mp4/fondo.mp4", true);
        this.load.image("logo", fotoPerfil);
        this.load.image("botonInicio", "img/botonInicio.png");
        this.load.image("botonVolver", "img/botonVolver.png");
        this.load.image("botonFacil", "img/botonFacil.png");
        this.load.image("botonNormal", "img/botonNormal.png");
        this.load.image("botonDificil", "img/botonDificil.png");
        this.load.image("separador", "img/barrauno.png");
    }

    create() {
        this.fondo = this.add.video(600, 350, "background");
        this.fondo.play(true);
        this.logo = this.add.image(350, 300, "logo");
        this.logo.setCrop(50, 100, 400, 400);
        this.logo.setScale(0.8);
        var rect1 = this.add.rectangle(1200, 0, 1000, 2000, 0x7777ff, 0.95);
        var rect2 = this.add.rectangle(0, 1500, 1400, 2000, 0x7777ff, 0.8);
        this.barra = this.add.image(1150, 370, "separador");
        this.barra.setScale(1.1);
        this.add.text(225, 50, usuario, {
			fontFamily: 'Helvetica',
			fontSize: '48px',
			color: '#fff',
			fontStyle: 'normal',
			strokeThickness: 2
		});
       this.añadirTexto(this);
    }

     añadirTexto(scene){
        var puntuaciones = ['50', '250', '500', '750', '1000', '1500', '2000', '5000', '10000', '25000', '50000', '100000', '250000', '500000', '1000000'];
        var contador = 1;
        puntuaciones.forEach(function (element){
            if(contador == game.registry.get("pregunta")){
                scene.add.rectangle(1180, (742 - (contador * 47)), 900, 50, 0xff7700, 0.8);            
                var texto1 = scene.add.text(1375, (725 - (contador * 47)), element + "€", {
                    fontFamily: 'Helvetica',
                    fontSize: '30px',
                    color: '00xeee1ba',
                    fontStyle: 'normal',
                    strokeThickness: 0
                });
                var texto2 = scene.add.text(775, (725 - (contador * 47)), contador, {
                    fontFamily: 'Helvetica',
                    fontSize: '30px',
                    color: '00xeee1ba',
                    fontStyle: 'normal',
                    strokeThickness: 0
                });
            } else{
                scene.add.text(1375, (725 - (contador * 47)), element + "€", {
                    fontFamily: 'Helvetica',
                    fontSize: '30px',
                    color: '#fff',
                    fontStyle: 'normal',
                    strokeThickness: 0
                });
                scene.add.text(775, (725 - (contador * 47)), contador, {
                    fontFamily: 'Helvetica',
                    fontSize: '30px',
                    color: '#fff',
                    fontStyle: 'normal',
                    strokeThickness: 0
                });
            }
           
            console.log(contador);
            contador++;
        }, this);
    }
}
