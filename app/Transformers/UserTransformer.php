<?php
/**
 * Created by PhpStorm.
 * User: Guillermo David
 * Date: 12/11/2016
 * Time: 11:26 AM
 */

namespace App\Transformers;
use App\User;

use League\Fractal\TransformerAbstract;

/**
 * Class userTransformer
 * @package App\Transformers
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->uuid,
            'email' => $user->email,
            'name' => $user->name,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ];
    }
}