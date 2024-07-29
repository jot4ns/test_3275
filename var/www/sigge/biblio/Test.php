<?php

namespace App;

/**
 * Clase HolaMundo
 *
 * Esta clase demuestra métodos básicos en PHP con comentarios PHPDoc.
 */
class HolaMundo
{
    /**
     * Saluda al mundo.
     *
     * @return string
     */
    public function saludar(): string
    {
        return '¡Hola, Mundo!';
    }

    /**
     * Saluda a una persona específica.
     * @param string $nombre El nombre de la persona a saludar.
     *
     * @return string
     */
    public function saludarA(string $nombre): string
    {
        return '¡Hola, ' . $nombre . '!';
    }

    /**
     * Despide al mundo.
     *
     * Este método no está documentado correctamente, intencionalmente.
     */
    public function despedir()
    {
        return '¡Adiós, Mundo!';
    }
}

// Crear una instancia de la clase HolaMundo y llamar a sus métodos
$holaMundo = new HolaMundo();
echo $holaMundo->saludar() . PHP_EOL;
echo $holaMundo->saludarA('Jaime') . PHP_EOL;
echo $holaMundo->despedir() . PHP_EOL;
