/*const sendRequest = (action, jsonBody) => {
	const URL = `${document.location}PHP/${action}.php`;
	return new Promise(async (resolve, reject) => {
		await fetch(URL, {
			method: 'POST',
			headers: {
				'Accept': 'application/json',
				'Content-Type': 'application/json'
			},
			body: JSON.stringify(jsonBody)
		})
			.then(response => response.text().then(data => {
				return ({ status: response.status, body: JSON.parse(data) })
			}
			))
			.then((data) => resolve(data))
			.catch(err => reject(Error(err.message)));
	});
};*/

/*const calcular = (event) => {
	event.preventDefault();
	const form = document.getElementById('frmOperacion');
	let jsonData = {};

	for (const pair of new FormData(form)) {
		jsonData[pair[0]] = pair[1];
	}

	//const respuesta = await enviarPeticion('controller.php', jsonData);
	console.log(document.getElementById('lblResultado').value = respuesta.body.resultado);

}*/
const clasificar = async () => {
	await enviarPeticion("clasificar");
}

const crearRenglonVista1 = (datos) => {
	nombreCompleto = datos[1]+ " " + datos[2];
	datos.splice(1, 2, nombreCompleto);
	datos.splice(3, 1);
	tr = document.createElement("tr");
	datos.forEach(element => {
		td = document.createElement("td");
		td.innerText = reemplazarBool(element);
		tr.appendChild(td);
	});
	document.getElementById("tabla").appendChild(tr);
}

const reemplazarBool = (valor) => {
	if (valor == true || valor == 1){
		return "SI";
	}else if (valor == false || valor == 0){
		return "NO";
	}else{
		return valor;
	}
}

const crearTablaVista2 = async () => {
	const datos = await ajustarRespuesta();
	document.getElementById("tabla");
	Object.entries(datos).forEach(([key1]) => {
		tr = document.createElement("tr");
		tr.id = `formulario${key1}`;
		Object.entries(datos[key1]).forEach(([key, value]) => {
			td = document.createElement("td");
			if (typeof value == 'object'){
				input = document.createElement("input");
				input.type = "checkbox";
				input.checked = "";
				td.appendChild(input);
			}else{
				td.innerText = value;
			}
			tr.appendChild(td);
		});
		button = document.createElement("button");
		button.innerText = "Modificar";
		button.addEventListener("click", function(){/*enviarPeticion("updateDatos", tr.children[0].innerText);*/}, false);
		tr.appendChild(button);
		document.getElementById("tabla").appendChild(tr);	
	});
	recolectarDatosVista2(document.getElementById("tabla"));
}

const ajustarRespuesta = async () => {
	respuesta = await enviarPeticion("selectDatos");
	var datos = [];
	Object.entries(respuesta.body).forEach(([key]) => {
		datos.push(new Object());
		datos[key].Cedula = respuesta.body[key].Cedula;
		datos[key].NombreCompleto = respuesta.body[key].Nombre + " " + respuesta.body[key].Apellido;	
		datos[key].FechaNacimiento = respuesta.body[key].FechaNacimiento;
		delete respuesta.body[key].Cedula;
		delete respuesta.body[key].Nombre;
		delete respuesta.body[key].Apellido;
		delete respuesta.body[key].FechaNacimiento;
		Object.entries(respuesta.body[key]).forEach(([key1, value]) => {
			if(key1 != "Genero" && key1 != "Aspirante_Id"){
				datos[key][key1] = null;
			}
		});
	});
	return datos;
}

const crearTablaVista3 = async (action) => {
	respuesta = await enviarPeticion(action);
	document.createElement("");
}

const enviarPeticion = async (action, jsonBody) => {
	let direccionDocumento =  document.documentURI;
	let res = 0;
	const URL = `${direccionDocumento.replace(direccionDocumento.slice(direccionDocumento.lastIndexOf("/")+1), '')}Controllers/${action}.php`;
	//const URL = `php/${action}`; //por alguna razon funciona asi
	console.log(URL);
	const headers = new Headers({'Accept': 'application/json','Content-Type': 'application/json'});
	const myInit = {
			method: 'POST',
			headers: headers,
			body: JSON.stringify(jsonBody)
	};
	const request = new Request(URL, myInit);
	try {
		awswer = await fetch(request);
		console.log(awswer.status);
		if (awswer.status == 200){
			awswer = await awswer.json();
			res = {body:awswer};
			return res;
		}
	} catch(e) {
		console.log(Error(e.message));
	}
	
}
const recolectarDatosVista2 = (tabla) => {
	let json = {};
	let lista = Array.from(tabla.childNodes);
	lista.shift();
	lista.shift();
	lista.forEach((value, key) => {
		console.log(); Array.from(tabla.childNodes)
	});
}

const recolectarDatos = (tipoDeSalida, formulario) => {
	const form = document.getElementById(formulario);
	if(tipoDeSalida == 'JSON'){
		let datosPersonales = {};
		for (let pair of form){
			if(pair.type == 'checkbox'){
				datosPersonales[pair.name] = pair.checked;
			}else{
				datosPersonales[pair.name] = pair.value;
			}
		}
		return datosPersonales;
	}else { 
		let datosPersonales = new Array();
		let contador = 0;
		for (let pair of form){
			if(pair.nodeName == 'INPUT' || pair.nodeName == 'SELECT'){
				if(pair.type == 'checkbox'){
					datosPersonales[contador] = pair.checked;
				}else{
					datosPersonales[contador] = pair.value;
				}
				contador++;
			}
		}
		return datosPersonales;
	}
}
/*
const recolectarDatos = (tipoDeSalida, formulario) => {
	const form = document.getElementById(formulario);
	if(tipoDeSalida == 'JSON'){
		let datosPersonales = {};
		for (let pair of form){
			if(pair.type == 'checkbox'){
				datosPersonales[pair.name] = pair.checked;
			}else{
				datosPersonales[pair.name] = pair.value;
			}
		}
		return datosPersonales;
	}else { 
		let datosPersonales = new Array();
		let contador = 0;
		for (let pair of form){
			if(pair.nodeName == 'INPUT' || pair.nodeName == 'SELECT'){
				if(pair.type == 'checkbox'){
					datosPersonales[contador] = pair.checked;
				}else{
					datosPersonales[contador] = pair.value;
				}
				contador++;
			}
		}
		return datosPersonales;
	}
}
*/