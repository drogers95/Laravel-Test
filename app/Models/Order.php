<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public function deleteThreeDayOldRecords() : void
    {
        // Convert to ISO 8601 date format
        $date = new DateTime;
        $date->modify('-3 days');
        $formatted = $date->format(DateTime::ISO8601);

        DB::table('orders')->where('created_at', '<=', $formatted)->delete();
    }

}
