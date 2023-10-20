<?php

namespace App\Enums;

enum FreelaStatus: string
{
    case FECHADA = 'fechada';
    case ABERTA = 'aberta';
    case EMCURSO = 'em Andamento';
}

