<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2, string $string3)
 */
class Package extends Model
{
    protected $fillable = [
        'title', 'remark', 'cost'
    ];
    public function organization()
    {
        return $this->hasOne(Organization::class, 'package_id');
    }
}
