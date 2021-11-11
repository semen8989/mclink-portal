<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait EmailLoggerTrait 
{
    private $emailLabel = 'label.global.email.log.general.';

    public function writeEmailLog($type, $email, $subject, $error = null) 
    {
        $isSuccess = is_null($error);
        $parameter = $this->getTransParameter($email, $isSuccess, $subject, $error);

        Log::$type(__($this->getLabelWithStatus($type, $isSuccess), $parameter));
    }

    private function getTransParameter($email, $isSuccess, $subject, $error = null)
    {
        $parameter['subject'] = $subject;
        $parameter['email'] = $email;
        
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