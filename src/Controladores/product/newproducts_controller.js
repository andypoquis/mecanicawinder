var idImage;

const formElement = document.querySelector('form');

formElement.addEventListener('submit', e => {
    e.preventDefault();

    const request = new XMLHttpRequest();

    request.open('POST', 'http://34.133.92.25/api/upload');

    request.send(new FormData(formElement));
    request.onload = function() {
        if (request.readyState === request.DONE) {
        if (request.status === 200) {
            console.log(request.response);
            idImage = JSON.parse(request.responseText);
            console.log(idImage[0].id); 

            var name = document.getElementById("name").value;
            var description = document.getElementById("description").value;
            var stock = document.getElementById("stock").value;
            var price = document.getElementById("price").value;

            const postProduct = async () => {
                var token = sessionStorage.getItem("token");
                var id = sessionStorage.getItem("id");
                try {
                const res = await fetch("http://34.133.92.25/api/products", {
                    method: "POST",
                    headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwiaWF0IjoxNjU0NTI4MTg3LCJleHAiOjE2NTcxMjAxODd9.bKC6DvAKDwxTS4_-LbzW9sO9cmaBU7u-LOafblmdsGo",
                    },
                    body : JSON.stringify({
                        "data": {
                        "name": name,
                        "description":description,
                        "stock": parseInt(stock),
                        "price": parseFloat(price),
                        "image" : [idImage[0].id]
                        
                        }
                    })
                });
                console.log("todo bien2");
                const data = await res.json().then((data) => {
                // table.innerHTML = generadorProducto(data);
                });
                if (res.status == 200) {
                } else {
                    console.log("Error");
                }
                } catch (ex) {
                
                }
            };

            postProduct();


        }
    }
    }
   
});