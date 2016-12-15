# Phalcon SMS Service
 
dd gemes duls lah ~

# TO DO

- [x] Add Nexmo
- [ ] Add Smscatel


# How To
- add Sms service to your DI , `$di->setShared('sms', \Didiroesmana\SMSService\Service::class);`
- add this to your config
	```json
	'smsService' => [
        'use' => 'Nexmo',
        'Nexmo' => [
            'api_key' => 'API_KEY',
            'api_secret' => 'API_SECRET',
            'endpoint' => 'https://rest.nexmo.com/sms/json',
        ],
    ],```