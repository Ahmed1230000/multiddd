<?php

namespace App\Domain\Superadmin\Repositories\Eloquent;

use App\Domain\Superadmin\Repositories\Contracts\SuperadminRepository;
use App\Domain\Superadmin\Entities\Superadmin;
use App\Infrastructure\AbstractRepositories\EloquentRepository;

/**
 * Class SuperadminRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SuperadminRepositoryEloquent extends EloquentRepository implements SuperadminRepository
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
        return Superadmin::class;
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