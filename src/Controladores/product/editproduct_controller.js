var idImage;
var idProduct = 0;

const formElement = document.querySelector('form');

const getProduct = async () => {
    var token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwiaWF0IjoxNjU0NTI4MTg3LCJleHAiOjE2NTcxMjAxODd9.bKC6DvAKDwxTS4_-LbzW9sO9cmaBU7u-LOafblmdsGo";
    var id = sessionStorage.getItem("id");
    try {
      const res = await fetch("http://34.133.92.25/api/products?populate=*", {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
          Authorization: "Bearer " + token,
        },
      });
      const data = await res.json().then((data) => {

        console.log (data.data[0].attributes.name)
        document.getElementById("name").value = data.data[0].attributes.name;
        document.getElementById("description").value = data.data[0].attributes.description;
        document.getElementById("stock").value = data.data[0].attributes.stock;
        document.getElementById("price").value = data.data[0].attributes.price;
        idProduct = data.data[0].id;
       
      });
      if (res.status == 200) {
      } else {
      }
    } catch (ex) {}
  };
  
getProduct();
  


formElement.addEventListener('submit', e => {
    e.preventDefault();
    const request = new XMLHttpRequest();
    var image = document.getElementById("image");
    var name = document.getElementById("name").value;
    var description = document.getElementById("description").value;
    var stock = document.getElementById("stock").value;
    var price = document.getElementById("price").value;


    if(image.value != ""){

        request.open('POST', 'http://34.133.92.25/api/upload');

        request.send(new FormData(formElement));
        request.onload = function() {
            if (request.readyState === request.DONE) {
            if (request.status === 200) {
                console.log(request.response);
                idImage = JSON.parse(request.responseText);
                console.log(idImage[0].id); 
    
          
    
                const postProduct = async () => {
                    var token = sessionStorage.getItem("token");
                    var id = sessionStorage.getItem("id");
                    try {
                    const res = await fetch("http://34.133.92.25/api/products/" + idProduct, {
                        method: "PUT",
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
    }else{

        const postProduct = async () => {
            var token = sessionStorage.getItem("token");
        
            try {
            const res = await fetch("http://34.133.92.25/api/products/" + idProduct, {
                method: "PUT",
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
                    
                    }
                })
            });
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


   
});