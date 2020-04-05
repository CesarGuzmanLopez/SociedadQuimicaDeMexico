<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 /**
 *  tabla para acceder a los tokens para recuperar el password
 * @author  Cesar Gerardo Guzman Lopez
 * @property string email
 * @property string token
 * @property User user usuario que tiene este token
 * @method  password_resets where()  where(fixed $param, fixed $param2)
 * @method  password_resets first() first(void)
 */
class password_resets extends Model
{
    /**
     * @property User user usuario que tiene este token
     * @see Model
     */
    
    protected $fillable =['email', 'token'];
    protected $table = 'password_resets';
    protected $hidden = ['token'];
    protected $primaryKey ="email";
    
    public $incrementing = false;
    
    /**
     * @return User
     */
    public function user()
    {
        return $this->belongsTo("App\User","email","email");
    }
}
