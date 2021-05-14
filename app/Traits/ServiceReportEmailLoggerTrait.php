<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait ServiceReportEmailLoggerTrait 
{
    private $emailLabel = 'label.service_report.email.log.general.';

    public function writeLog($type, $model, $subject, $error = null) 
    {
        $isSuccess = is_null($error);
        $parameter = $this->getTransParameter($model, $isSuccess, $subject, $error);

        Log::$type(__($this->getLabelWithStatus($type, $isSuccess), $parameter));
    }

    private function getTransParameter($model, $isSuccess, $subject, $error = null)
    {
        $parameter['subject'] = $subject;
        $parameter['email'] = $model->customer->email;
        
        if (!$isSuccess) {
            $parameter['error'] = $error;
        }

        return $parameter;
    }

    private function getLabelWithStatus($type, $isSuccess)
    {
        $status = $isSuccess ? 'success' : 'fail';

        return $this->emailLabel . $status;
    }
}
