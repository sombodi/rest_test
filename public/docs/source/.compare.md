---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://rest/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_7e9f5b1587d0c719b038488a542b7da1 -->
## Display a listing of clients.

> Example request:

```bash
curl -X GET "http://rest/api/v1/clients" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://rest/api/v1/clients",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
[
    {
        "id": 2,
        "email": "ddasasd@sadasdasda.com",
        "telephone": "*** **** 7687",
        "client_data": null
    },
    {
        "id": 3,
        "email": "aaaa@sadasdasda.com",
        "telephone": "*** **** 1111",
        "client_data": {
            "dsfds": "aa",
            "sdfsdfsdf": "bb",
            "fsdfsdf": "cc"
        }
    },
    {
        "id": 4,
        "email": "xxxx@sadasdasda.com",
        "telephone": "*** **** 2222",
        "client_data": {
            "dsfds": "aa",
            "sdfsdfsdf": "bb",
            "fsdfsdf": "cc"
        }
    }
]
```

### HTTP Request
`GET api/v1/clients`

`HEAD api/v1/clients`


<!-- END_7e9f5b1587d0c719b038488a542b7da1 -->

<!-- START_ea5d45fea2067cf017070eef3c0a218a -->
## Store a newly created client.

> Example request:

```bash
curl -X POST "http://rest/api/v1/clients" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://rest/api/v1/clients",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/clients`


<!-- END_ea5d45fea2067cf017070eef3c0a218a -->

<!-- START_a712717120a9bcce1484e57903aa6e00 -->
## Display the specified client.

> Example request:

```bash
curl -X GET "http://rest/api/v1/clients/{client}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://rest/api/v1/clients/{client}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/v1/clients/{client}`

`HEAD api/v1/clients/{client}`


<!-- END_a712717120a9bcce1484e57903aa6e00 -->

<!-- START_a2f5d404b22778510ba03d1f69fc2995 -->
## Update the specified client.

> Example request:

```bash
curl -X PUT "http://rest/api/v1/clients/{client}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://rest/api/v1/clients/{client}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/clients/{client}`

`PATCH api/v1/clients/{client}`


<!-- END_a2f5d404b22778510ba03d1f69fc2995 -->

<!-- START_a459ae691097b563ccfa0d03a96bb9c0 -->
## Delete the specified client.

> Example request:

```bash
curl -X DELETE "http://rest/api/v1/clients/{client}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://rest/api/v1/clients/{client}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/clients/{client}`


<!-- END_a459ae691097b563ccfa0d03a96bb9c0 -->

