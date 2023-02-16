<?php

namespace App\Domain\Postcomment\Repositories\Eloquent;

use App\Domain\Postcomment\Repositories\Contracts\PostcommentRepository;
use App\Domain\Postcomment\Entities\Postcomment;
use App\Infrastructure\AbstractRepositories\EloquentRepository;

/**
 * Class PostcommentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PostcommentRepositoryEloquent extends EloquentRepository implements PostcommentRepository
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
        return Postcomment::class;
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