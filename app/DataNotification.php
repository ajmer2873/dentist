<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class DataNotification extends Model
{
	use Notifiable;
	
      public function Order()
        {
           
            return $this->hasMany('App\Order');
        }
}
