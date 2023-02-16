<?php

namespace App\Domain\Superadmin\Entities;

// use App\Infrastructure\AbstractModels\BaseModel as Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Domain\Superadmin\Entities\Traits\Relations\SuperadminRelations;
use App\Domain\Superadmin\Entities\Traits\CustomAttributes\SuperadminAttributes;
use App\Domain\Superadmin\Repositories\Contracts\SuperadminRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Superadmin extends Authenticatable
{
    use SuperadminRelations, SuperadminAttributes,Notifiable,HasFactory,HasApiTokens,HasRoles;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'Superadmin';

    /**
     * define belongsTo relations.
     *
     * @var array
     */
    private $belongsTo = [];

    /**
     * define hasMany relations.
     *
     * @var array
     */
    private $hasMany = [];

    /**
     * define belongsToMany relations.
     *
     * @var array
     */
    private $belongsToMany = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "superadmins";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = SuperadminRepository::class;
}
