<?php

namespace App\Enum;

enum RoleEnum: string
{
    case CLIENT_PARTICULIER = 'client_particulier';
    case CLIENT_PRO = 'client_pro';
    case COMMERCIAL = 'commercial';
    case GESTION_PRODUIT_FOURNISSEUR = 'gestion_produit_fournisseur';
}
