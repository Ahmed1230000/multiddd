<?php

namespace App\Domain\Post\Entities;

use App\Infrastructure\AbstractModels\BaseModel as Model;
use App\Domain\Post\Entities\Traits\Relations\PostRelations;
use App\Domain\Post\Entities\Traits\CustomAttributes\PostAttributes;
use App\Domain\Post\Repositories\Contracts\PostRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use PostRelations, PostAttributes,HasFactory;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'Post';

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
        'post',
        'user_id',
    ];
    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "posts";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = PostRepository::class;
}
