# Installation

 - git clone git@github.com:sensorario/sf4-jwt-example.git
 - mkdir config/jwt
 - openssl genrsa -out config/jwt/private.pem -aes256 4096
 - openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem

# Tests

It is possibile to run behat and phpunit tests toghether

 - ./runtests.sh

or separately

 - ./bin/behat
 - ./bin/phpunit
