<?php

namespace App\Enums;

enum InviteStatus: string
{
    case PREENCHIDA = 'preenchida';
    case PENDENTE = 'pendente';
    case RECUSADA = 'recusada';

    public static function fromValue(string $status): string{
        foreach (self::cases() as $confirmaçao) {
            if($status === $confirmaçao->name){
                return $confirmaçao->value;
            }
        }

        throw new \ValueError("$status  is not  a valid");
    }

}

