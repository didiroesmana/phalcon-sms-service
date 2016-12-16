<?php

namespace Didiroesmana\SMSService\Providers;

use Didiroesmana\SMSService\Base\BaseProvider;
use \Exception;

class Clickatell extends BaseProvider
{
    /**
     * @param $message
     */
    public function send()
    {
        return $this->_buildQuery();
    }

    /**
     * @param $recipient
     */
    public function setRecipient($recipient)
    {
        $this->_recipient = $recipient;
        return $this;
    }

    /**
     * @param $sender
     */
    public function setSender($sender)
    {
        // $this->_sender = $sender;
        return $this;
    }

    /**
     * @param $message
     */
    public function setMessage($message)
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function _buildQuery()
    {
        $params = [];
        $params['content'] = $this->_message;
        $params['binary'] = false;
        $params['to'] = array_merge([], ((is_array($this->_recipient)) ? $this->_recipient : [$this->_recipient]));

        try {
            $response = $this->_client->request('POST', $this->_config->endpoint, [
                'json' => $params,
                'headers' => [
                    'Authorization' => $this->_config->token,
                ],
            ]);
            if ($body = json_decode($response->getBody())) {
                return $body;
            }
            throw new Exception("Error Processing Request", 1);

        } catch (Exception $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }
}
