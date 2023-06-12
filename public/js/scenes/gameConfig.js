import { InicioPartida } from "./inicioPartida.js";
import { FinalPartida } from "./finalPartida.js";
import { menuInicio } from "./menuInicio.js"; 
import { Opciones } from "./opciones.js";
import { Pregunta } from "./pregunta.js";
import { Fondo } from "./fondo.js";


const config = {
    type: Phaser.AUTO,
    parent: "juegoContainer",
    scene: [Fondo, menuInicio, Opciones, InicioPartida, FinalPartida, Pregunta],
    scale: {
        mode: Phaser.Scale.FIT,
        parent: 'juegoContainer',
        autoCenter: Phaser.Scale.CENTER_BOTH,
        width: 1560,
        height: 760,
    },
    physics: {
        default: "arcade",
        arcade: {
            gravity: { y: 400 },
            debug: false,
        },
    },
    canvasStyle: `display: block; width: 100%; height: 100%;`,
    autoFocus: true,
};

var game = new Phaser.Game(config);
window.game = game;

game.scene.start('menuInicio');





