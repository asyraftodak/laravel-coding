<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Auth\Enums\RoleType;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    protected array $roles = [
        RoleType::Admin,
        RoleType::Staff,
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->roles as $role) {
            Role::query()
                ->where('name', $role)
                ->delete();
        }
    }
};
