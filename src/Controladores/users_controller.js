//Obtener los usuarios
import { generadorUsuarios } from "../assets/js/utils/generartableuser.js";
const getDataUsers = async () => {
  var token = sessionStorage.getItem("token");
  var id = sessionStorage.getItem("id");
  try {
    const res = await fetch("http://34.133.92.25/api/users?populate=*", {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        Authorization: "Bearer " + token,
      },
    });
    console.log("todo bien");
    const data = await res.json().then((data) => {
      table.innerHTML = generadorUsuarios(data);
    });
    if (res.status == 200) {
    } else {
    }
  } catch (ex) {}
};

getDataUsers();
