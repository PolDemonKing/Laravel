<?php

namespace App\Enums;

enum Efecto: string 
{
    case ATAQUE = 'ataque';
    case DEFENSA = 'defensa';
    case CURA = 'cura';
    case DAÑO = 'daño';
    case FUEGO = 'fuego';
    case HIELO = 'hielo';
}
