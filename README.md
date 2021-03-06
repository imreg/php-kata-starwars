# php-kata-starwars

## PHP-Kata Star Wars API

### 1 part
You are R2D2 and you have to download part of the Cybersecurity Center of Excel ence API.  
 
The base url is ​https://death.star.api/​ ​(*Not a valid URL) 
 
The endpoints are: 

- /token This endpoint accepts POST requests. 
- /reactor/exhaust/1, this endpoint accepts DELETE requests only. 
- /prison/lea, this endpoint accepts GET requests only. 
 
Each connection to the system requires an oauth2 token, for the purposes of this exercise this token does not expire, but 
you wil  have to get it from the token endpoint. 
 
The system requires an ssl certificate and key to be sent with every request, including token. 
 
Endpoint Details:

``` 
Endpoint: /token
``` 


```
          Credentials: 
                 Client Secret - Alderan 
                 Client ID - R2D2 
```

```
          Accepts:
               POST
``` 

```
          Headers:  
              Content-Type: application/x-www-form-urlencoded
``` 

```
          Body: 
              grant_type = client_credentials
``` 
 
```
          Returns:
               { 
                  "access_token": "e31a726c4b90462ccb7619e1b51f3d0068bf8006", 
                  "expires_in": 99999999999, 
                  "token_type": "Bearer", 
                  "scope": “TheForce” 
               } 
```


```
Endpoint: /reactor/exhaust/1
``` 

```
          Accepts:  DELETE
```
  
```
          Headers:
                 Authorization: Bearer [token] 
                 Content-Type: application/json 
                 x-torpedoes: 2 
```

```
Endpoint: /prisoner/leia 
```    

```
          Accepts: GET
```

```
          Headers: 
                 Authorization: Bearer [token]    
                 Content-Type: application/json 
```

### 2 part

As witty astromech droid, you wil  be cal ed on by witless humans to hack complicated defence systems on a fly. So you 
have decided to mock the response as a series of ​unit tests​. Long before you arrive at the death star. These tests should 
cover success and failure. You know that each endpoint wil  be  Droidspeak(Binary). You wil  need to process this and 
return in galactic basic (english). Write a service to undertake this. 
 
 
```
Endpoint: /prisoner/leia,
```  

``` 
          { 
             "cel ":  "01000011 01100101 01101100 01101100 00100000 00110010 00110001 00111000 00110111", 
             "block": "01000100 01100101 01110100 01100101 01101110 01110100 01101001 01101111 01101110 
                       00100000 01000010 01101100 01101111 01100011 01101011 00100000 01000001 01000001 
                       00101101 00110010 00110011 00101100" 
          } 
```
 