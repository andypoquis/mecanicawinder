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
    
    const postProduct = async () => {
        var token = sessionStorage.getItem("token");
        var id = sessionStorage.getItem("id");
        try {
        const res = await fetch("http://34.133.92.25/api/products/"+ idProduct, {
            method: "DELETE",
            headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwiaWF0IjoxNjU0NTI4MTg3LCJleHAiOjE2NTcxMjAxODd9.bKC6DvAKDwxTS4_-LbzW9sO9cmaBU7u-LOafblmdsGo",
            },
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
      
);