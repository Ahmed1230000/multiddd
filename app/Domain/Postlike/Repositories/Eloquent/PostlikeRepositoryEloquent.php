<?php

namespace App\Domain\Postlike\Repositories\Eloquent;

use App\Domain\Postlike\Repositories\Contracts\PostlikeRepository;
use App\Domain\Postlike\Entities\Postlike;
use App\Infrastructure\AbstractRepositories\EloquentRepository;

/**
 * Class PostlikeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PostlikeRepositoryEloquent extends EloquentRepository implements PostlikeRepository
{
    
    /**
     * Specify Fields
     *
     * @return string
     */
    protected $allowedFields = [
        ###allowedFields###
    	###\allowedFields###
    ];

    /**
     * Include Relationships
     *
     * @return string
     */
    protected $allowedIncludes = [
        ###allowedIncludes###
    	###\allowedIncludes###
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Postlike::class;
    }
    
    /**
     * Specify Model Relationships
     *
     * @return string
     */
    public function relations()
    {
        return [
            ###allowedRelations###
            ###\allowedRelations###
        ];
    }
}