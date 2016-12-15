<?php

namespace Didiroesmana\SMSService\Providers;

class Nexmo implements SmsProviderInterface
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
    public function setRecipients($recipient)
    {
        $this->_recipient = $recipient;
    }

    /**
     * @param $sender
     */
    public function setSender($sender)
    {
        $this->_sender = $sender;
    }

    /**
     * @param $message
     */
    public function setMessage($message)
    {
        $this->_message = $message;
    }

    /**
     * @return mixed
     */
    protected function _buildQuery()
    {
        $params = [];
        $params['from'] = $this->_sender;
        $params['to'] => $this->_recipient;
        $params['text'] => $this->_message;
        $params['api_key'] = $this->_config->api_key;
        $params['api_secret'] = $this->_config->api_secret;

        try {
            $response = $_client->request('POST', $this->_config->endpoint, [
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
