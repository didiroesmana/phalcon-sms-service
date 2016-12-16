# Phalcon SMS Service
Service Adapter for Multiple SMS Service such as Nexmo , Clickatell.

# TO DO

- [x] Add Nexmo
- [x] Add Clickatell
- [x] Clickatell batch send
- [x] Changeable SMS Provider
- [ ] Error Handling
- [ ] Unit Test


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
        - to send batch sms , create array of number and put it in second arguments
            ```php
                dump($this->sms->send('DDGEMES',['+62xxxx','+62xxxxx','+1xxxxxx' ...]));
            ```
