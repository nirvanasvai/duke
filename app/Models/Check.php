<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed|string type
 * @property mixed|string code
 * @property mixed|string user_id
 * @property mixed|string image
 * @property mixed|string status
 */
class Check extends Model
{
    use HasFactory;
	
	public const PRIZE = 'призовой';
	public const COMMON = 'обычный';
    
    protected $guarded;
    
    public function userRelationship()
	{
		return $this->hasMany(User::class,'id','user_id');
	}
	
}
