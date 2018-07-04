<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
 use Notifiable , Sortable;

     protected $fillable = [
        		
        		'order_id','customer_name','order_date', 'assigned_to','status','prescription'
    
    ];

     public function User()
    {
        
        return $this->belongsToMany('App\User');
 
    }

    public function DataNotification()
    {
        
        return $this->belongsToMany('App\DataNotification');
 
    }
}
