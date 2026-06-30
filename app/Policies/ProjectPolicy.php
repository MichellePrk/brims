<?php

declare(strict_types=1);

namespace App\Policies;

use App\Enums\TeamRoles;
use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return evaluate_permission($authUser, 'View:Project');
        // return evaluate_permission($authUser, 'ViewAny:Project');
    }

    public function view(AuthUser $authUser, Project $project): bool
    {
        // return $project->members->contains('id', $authUser->id);
        return evaluate_permission($authUser, 'View:Project') || $project->members->contains('id', $authUser->id) || $project->leader_id === $authUser->id;
    }

    public function create(AuthUser $authUser): bool
    {
        return evaluate_permission($authUser, 'Manage:Project') || $authUser->team_role === TeamRoles::Admin;
    }

    public function update(AuthUser $authUser, Project $project): bool
    {
        return evaluate_permission($authUser, 'Manage:Project') || $authUser->team_role === TeamRoles::Admin;
    }

    public function delete(AuthUser $authUser, Project $project): bool
    {
        return evaluate_permission($authUser, 'Delete:Project') || $authUser->team_role === TeamRoles::Admin;
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return evaluate_permission($authUser, 'Delete:Project') || $authUser->team_role === TeamRoles::Admin;
    }
}
