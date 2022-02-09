<?php

// This file would extend a cron controller
class House_Keeping_Controller
{
    /**
     * Delete Orders older than 3 days
     */
    protected function deleteOrdersOldersThanThreeDays() : void
    {
        $orderController = new \App\Models\Order();
        $orderController->deleteThreeDayOldRecords();
    }

}
