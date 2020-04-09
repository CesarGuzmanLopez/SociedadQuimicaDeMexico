<?php
/**
 *
 * Creado Usando  Reliese Model.
 * @author Cesar Gerardo Guzman López
 */
namespace app\Traits;
use App\Models\Role;
use App\Models\Permission;
trait HasRolesAndPermissions
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }
    
    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }
    /**
     * @param mixed ...$roles
     * @return bool
     */
    public function hasRole(... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
    /**
     * Verifica si un usuario tiene un permiso directo
     * @param string $permission 
     * @return boolean
     */
    public function hasPermission($permission)
    { 
        return (bool) $this->permissions->where('slug', $permission)->count();
    }
    
    /**
     * 
     * @param Permission $permission
     * @return boolean
     */
    public function hasPermissionThroughRole(Permission $permission)
    {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role))
                return true;
        }
        return false;
    }
    /**
     * @param $permission
     * @return bool
     */
    function hasPermissionTo($permission)
    {
    	
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }
    /**
     * @param array $permissions
     * @return mixed
     */
    protected function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('slug',$permissions)->get();
    }
    
    /**
     * @param mixed ...$permissions
     * @return $this
     */
    public function givePermissionsTo(... $permissions)
    {
    	
        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }
    /**
     * @param mixed ...$permissions
     * @return $this
     */
    public function deletePermissions(... $permissions )
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }
    
    /**
     *  
     * @param mixed ...$permissions
     * @return HasRolesAndPermissions
     */
    public function refreshPermissions(... $permissions )
    {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }
} 