<?php

namespace Didiroesmana\SMSService\Providers;

use Didiroesmana\SMSService\Base\BaseProvider;

class Nexmo extends BaseProvider
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
        $this->_sender = $sender;
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
        $params['from'] = $this->_sender;
        $params['to'] = $this->_recipient;
        $params['text'] = $this->_message;
        $params['api_key'] = $this->_config->api_key;
        $params['api_secret'] = $this->_config->api_secret;

        try {
            $response = $this->_client->request('POST', $this->_config->endpoint, [
                'json' => $params,
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
