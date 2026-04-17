# Sistem Manajemen Buku

## Getting Started
THIS IS JUST AN EXAMPLE ON HOW TO ACTUALLY USE IT YOU CAN SIMPLY READ [API.md](API.md) for detailed instruction.  
### Register  

HEADERS:  
- Key :Accept  
- Value :application/json  

Method:POST  
URL:[http://127.0.0.1:8080/api/register](http://127.0.0.1:8080/api/register)  
EXAMPLE OF BODY:  
```
{
    "name": "bazzite",
    "email": "bazzite@gg.com",
    "password": "bazzite.gg",
    "password_confirmation": "bazzite.gg"
}
```
RESPONSE:  
```
{
    "access_token": "1|vVCLpytUJgMSRMiW2zt0AA1qRvftA3DRTqNiMkXAb948770e",
    "token_type": "Bearer",
    "user": {
        "name": "bazzite",
        "email": "bazzite@gg.com",
        "updated_at": "2026-04-17T04:58:22.000000Z",
        "created_at": "2026-04-17T04:58:22.000000Z",
        "id": 1
    }
}
```

### Login

METHOD:POST  
URL:[http://127.0.0.1:8080/api/login](http://127.0.0.1:8080/api/login)  
BODY:  
```
{
    "email": "bazzite@gg.com",
    "password": "bazzite.gg"
}
```  

RESPONSE:  
```
{
    "access_token": "2|46svRT1s6HN5XW2kd74No4kiW6Sot4xi5fhSjH3193ba7d98",
    "token_type": "Bearer",
    "user": {
        "id": 1,
        "name": "bazzite",
        "email": "bazzite@gg.com",
        "email_verified_at": null,
        "created_at": "2026-04-17T04:58:22.000000Z",
        "updated_at": "2026-04-17T04:58:22.000000Z"
    }
}
```

## CRUD BUKU
Sekarang coba ambil data buku. Karena pakai auth:sanctum, kamu butuh token tadi.

* Method: GET
* URL: http://localhost:8080/api/books
* Headers:  
Key:Accept  
Accept: application/json  
Authorization: Bearer  

```
2|46svRT1s6HN5XW2kd74No4kiW6Sot4xi5fhSjH3193ba7d98
```  



