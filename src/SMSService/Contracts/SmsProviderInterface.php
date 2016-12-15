<?php

namespace Didiroesmana\SMSService\Contracts;

interface SMSProviderInterface
{
    /**
     * Send SMS method
     * @param $message
     */
    public function send();

    /**
     * Set recipient of message
     * @param $recipient
     */
    public function setRecipient($recipient);

    /**
     * Set masking of message
     * @param $sender
     */
    public function setSender($sender);

    /**
     * @param $message
     */
    public function setMessage($message);
}
