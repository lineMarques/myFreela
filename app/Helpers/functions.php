<?php

use App\Enums\InviteStatus;

if(!function_exists("getStatusInvite")){

    function getStatusInvite(string $confirmacao): string{
        return InviteStatus::fromValue($confirmacao);
    }

}
