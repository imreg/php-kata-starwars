# php-kata-starwars
PHP-Kata Star Wars API

You are R2D2 and you have to download part of the Imperial Operating System’s Cybersecurity Center of Excel ence API.  
 
The base url is ​https://death.star.api/​ ​(*Not a valid URL) 
 
The endpoints are: 

- /token This endpoint accepts POST requests. 
- /reactor/exhaust/1, this endpoint accepts DELETE requests only. 
- /prison/lea, this endpoint accepts GET requests only. 
 
Each connection to the system requires an oauth2 token, for the purposes of this exercise this token does not expire, but 
you wil  have to get it from the token endpoint. 
 
The system requires an ssl certificate and key to be sent with every request, including token. 
 
Endpoint Details:

###### 1. End point
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