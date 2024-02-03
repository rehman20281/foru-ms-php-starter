const settings = {
    url: 'https://foru-ms.vercel.app/api/v1/posts/disliked',
    method: 'GET',
    async: true,
    crossDomain: true,
    headers: {
        'x-api-key': 'e96779a0-3fb6-43eb-b719-88396fed5123',
        Authorization: 'Bearer 123',
        'Access-Control-Allow-Headers':'*'
    }
};

$.ajax(settings).done(function (response) {
    console.log(response);
});
