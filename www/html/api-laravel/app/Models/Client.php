<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 */
class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email'
    ];
}
