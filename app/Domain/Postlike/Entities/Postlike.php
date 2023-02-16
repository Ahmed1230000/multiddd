<?php

namespace App\Domain\Postlike\Entities;

use App\Infrastructure\AbstractModels\BaseModel as Model;
use App\Domain\Postlike\Entities\Traits\Relations\PostlikeRelations;
use App\Domain\Postlike\Entities\Traits\CustomAttributes\PostlikeAttributes;
use App\Domain\Postlike\Repositories\Contracts\PostlikeRepository;

class Postlike extends Model
{
    use PostlikeRelations, PostlikeAttributes;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'Postlike';

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
        'user_id',
        'post_id',
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "postlikes";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = PostlikeRepository::class;
}
