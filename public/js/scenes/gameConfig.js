import { menuInicio } from "./menuInicio.js"; 
import { Opciones } from "./opciones.js";

const config = {
    type: Phaser.WEBGL,
    parent: "juegoContainer",
    scene: [menuInicio, Opciones],
    scale: {
        mode: Phaser.Scale.ScaleModes.NONE,
        width: window.innerWidth,
        height: window.innerHeight,
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
    audio: {
        disableWebAudio: false,
    },
};

var game = new Phaser.Game(config);
window.game = game;

