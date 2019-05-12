<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'ContractNo', 'ContractName', 'IdDriver', 'IdContractType', 'ContractSeq', 'FrDate', 'ExDate', 'FileContent', 'Status', 'Notes'
    ];
}
