# Phalcon SMS Service
Service Adapter for Multiple SMS Service such as Nexmo , Clickatell.

# TO DO

- [x] Add Nexmo
- [x] Add Clickatell
- [ ] Clickatell batch send
- [ ] Error Handling
- [ ] Unit Test
- [ ] Changeable SMS Provider


# How To
- add this to your config
    
    ```php
		'smsService' => [
			'use' => 'Nexmo',
			'Nexmo' => [
		    		'api_key' => env('NEXMO_API_KEY','YOUR NEXMO API KEY'),
		    		'api_secret' => env('NEXMO_API_SECRET','API_SECRET'),
		    		'endpoint' => 'https://rest.nexmo.com/sms/json',
			],
			'Clickatell' => [
                'token' => env('CLICKATELL_TOKEN', 'YOUR CLICKATELL TOKEN'),
                'endpoint' => 'https://platform.clickatell.com/messages',
            ],
    	],
    ```
- add Sms service to your DI , 
    ```php
    $di->setShared('sms', \Didiroesmana\SMSService\Service::class);
    ```
- Send SMS
    - get sms service from DI
    - and send it
        ```php
        // first parameter is sender
        // second is the recipient number
        // third is the message
        dump($this->sms->send('DDGEMES','69696969696969','ANU DD GEMESH'));
        ```
        
- Providers
    - Nexmo
    - Clickatell