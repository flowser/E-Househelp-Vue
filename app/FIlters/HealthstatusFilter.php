<?php

// HealthstatusFilter.php

namespace App\Filters;

class HealthstatusFilter
{
    public function filter($builder, $value)
    {        
        return $builder->whereHas('healthstatus', function($query) use($value)
                                    {
                                    $query ->where('status', $value);
                                    }
                                );
        
        
        // join('healthstatuses', 'healthstatuses.bureau_househelp_id', '=','healthstatuses.id')
                    //    ->where('healthstatuses.status', '=', $value);                       
    }
}

