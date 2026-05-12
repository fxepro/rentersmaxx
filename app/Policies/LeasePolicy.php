<?php
namespace App\Policies;
use App\Models\{User, Lease};
class LeasePolicy {
    public function view(User $user, Lease $lease): bool {
        return $user->id === $lease->property->landlord_id || $user->id === $lease->tenant_id;
    }
    public function update(User $user, Lease $lease): bool {
        return $user->id === $lease->property->landlord_id;
    }
}
