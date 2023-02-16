<?php

namespace App\Domain\Postcomment\Entities;

use App\Infrastructure\AbstractModels\BaseModel as Model;
use App\Domain\Postcomment\Entities\Traits\Relations\PostcommentRelations;
use App\Domain\Postcomment\Entities\Traits\CustomAttributes\PostcommentAttributes;
use App\Domain\Postcomment\Repositories\Contracts\PostcommentRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Postcomment extends Model
{
    use PostcommentRelations, PostcommentAttributes, HasFactory;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'Postcomment';

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
        'comment',
        'user_id',
        'post_id',
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "postcomments";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = PostcommentRepository::class;
}
