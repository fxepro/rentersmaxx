<?php
namespace App\Policies;
use App\Models\{User, MaintenanceRequest};
class MaintenanceRequestPolicy {
    public function update(User $user, MaintenanceRequest $mr): bool {
        return $user->id === $mr->lease->property->landlord_id;
    }
}
