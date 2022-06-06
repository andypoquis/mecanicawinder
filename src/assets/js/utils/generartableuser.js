const generadorUsuarios = (data) => {
  let columna = `<thead id='hearder_table'> `;
  columna += `<tr>`;
  columna += `<th>id</th>`;
  columna += `<th>rol</th>`;
  columna += `<th>usuarios</th>`;
  columna += `<th>Nombre</th>`;
  columna += `<th colspan="2">Operaciones</th>`;
  columna += `</tr>`;
  columna += `</thead>`;

  for (var i = 0; i < data.length; i++) {
    columna += `<tbody>`;
    columna += `<td >${data[i].id}</td>`;
    columna += `<td >${data[i].role.type}</td>`;
    columna += `<td >${data[i].username}</td>`;
    columna += `<td >${data[i].name}</td>`;
    columna += `<td><a href="#" class="td-team img-1"></td>`;
    columna += `<td><a href="#" class="td-team img-3"></td>`;
    columna += `</tbody>`;
  }

  return columna;
};
const generadorProducto = (data) => {
  let columna = `<thead id='hearder_table'> `;
  columna += `<tr>`;
  columna += `<th>Id</th>`;
  columna += `<th>Nombre</th>`;
  columna += `<th>Img</th>`;
  columna += `<th>Description</th>`;
  columna += `<th>Stock</th>`;
  columna += `<th>Precio</th>`;
  columna += `<th colspan="2">Operaciones</th>`;
  columna += `</tr>`;
  columna += `</thead>`;

  console.log(data.data.length);

  for (var i = 0; i < data.data.length; i++) {
    columna += `<tbody>`;
    columna += `<td >${data.data[i].id}</td>`;
    columna += `<td >${data.data[i].attributes.name}</td>`;
    columna += `<td ><img src="http://34.133.92.25${data.data[i].attributes.image.data[0].attributes.url}" style="width:50px"></img></td>`;
    columna += `<td >${data.data[i].attributes.description}</td>`;
    columna += `<td >${data.data[i].attributes.stock}</td>`;
    columna += `<td >${data.data[i].attributes.price}</td>`;
    columna += `<td><a href="#" class="td-team img-1"></td>`;
    columna += `<td><a href="#" class="td-team img-3"></td>`;
    columna += `</tbody>`;
  }

  return columna;
};
const generadorServicios = (data) => {
  let columna = `<thead id='hearder_table'> `;
  columna += `<tr>`;
  columna += `<th>Id</th>`;
  columna += `<th>Nombre</th>`;
  columna += `<th>Img</th>`;
  columna += `<th>Description</th>`;

  columna += `<th>Precio</th>`;
  columna += `<th colspan="2">Operaciones</th>`;
  columna += `</tr>`;
  columna += `</thead>`;

  console.log(data.data.length);

  for (var i = 0; i < data.data.length; i++) {
    columna += `<tbody>`;
    columna += `<td >${data.data[i].id}</td>`;
    columna += `<td >${data.data[i].attributes.name}</td>`;
    columna += `<td ><img src="http://34.133.92.25${data.data[i].attributes.image.data.attributes.url}" style="width:50px"></img></td>`;
    columna += `<td >${data.data[i].attributes.description}</td>`;

    columna += `<td >${data.data[i].attributes.price}</td>`;
    columna += `<td><a href="#" class="td-team img-1"></td>`;
    columna += `<td><a href="#" class="td-team img-3"></td>`;
    columna += `</tbody>`;
  }

  return columna;
};

const generarClientServices = (data) => {
  let columna = `<thead id='hearder_table'> `;
  columna += `<tr>`;
  columna += `<th>Id</th>`;
  columna += `<th>Cliente</th>`;
  columna += `<th>Técnico</th>`;
  columna += `<th>Servicio</th>`;
  columna += `<th colspan="2">Operaciones</th>`;
  columna += `</tr>`;
  columna += `</thead>`;

  for (var i = 0; i < data.data.length; i++) {
    columna += `<tbody>`;
    columna += `<td >${data.data[i].id}</td>`;
    columna += `<td >${data.data[i].attributes.client_service.data.attributes.name}</td>`;
    columna += `<td >${data.data[i].attributes.technical_service.data.attributes.name}</td>`;

    columna += `<td >${data.data[i].attributes.service.data.attributes.name}</td>`;
    columna += `<td><a href="#" class="td-team img-1"></td>`;
    columna += `<td><a href="#" class="td-team img-3"></td>`;
    columna += `</tbody>`;
  }

  return columna;
};
export { generadorUsuarios, generadorProducto, generadorServicios, generarClientServices };
