import { InicioPartida } from "./inicioPartida.js";
import { menuInicio } from "./menuInicio.js"; 
import { Opciones } from "./opciones.js";
import { Pregunta } from "./pregunta.js";


const config = {
    type: Phaser.AUTO,
    parent: "juegoContainer",
    scene: [menuInicio, Opciones, InicioPartida, Pregunta],
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

