<?php

namespace App\Permissions\V1;

use App\Models\User;

final class Abilities
{


    public const ViewUsers = "user:view";
    public const CreateUser = "user:create";
    public const UpdateUser = "user:update";
    public const DeactivateUser = "user:deactivate";
    public const ReplaceUser = "user:replace";
    public const DeleteUser = "user:delete";


    public const UpdateOwnData = "user:own:update";


    public static function getAbilities(User $user): array
    {
        if($user->isAdmin)
        {
            return
                [
                    self::ViewUsers,
                    self::CreateUser,
                    self::UpdateUser,
                    self::ReplaceUser,
                    self::DeleteUser,
                    self::UpdateOwnData,
                    self::DeactivateUser
                ];
        }
        else
        {
            return [self::UpdateOwnData];
        }
    }
}
