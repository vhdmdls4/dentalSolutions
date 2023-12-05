// document
//   .querySelector("#registerClient")
//   .addEventListener("submit", function (e) {
//     e.preventDefault();

//     const formData = new FormData(this);

//     fetch("../controllers/ClienteController.php", {
//       method: "POST",
//       body: formData,
//     })
//       .then((response) => response.json())
//       .then((response) => {
//         if (response.error) {
//           throw Error(response.error);
//         }
//         const formattedData = JSON.stringify(response, null, 2);
//         alert(`${response.titulo}\n${formattedData}`);
//         document.getElementById("registerClient").reset();
//       })
//       .catch((response) => {
//         alert(response);
//         console.log(response);
//       });
//     // .finally((message) => console.log(message)); se precisar finalizar algum carregamento, só fazer no finally
//   });

//   document
//   .querySelector("#registerPacient")
//   .addEventListener("submit", function (e) {
//     e.preventDefault();

//     const formData = new FormData(this);

//     fetch("../controllers/ClienteController.php", {
//       method: "POST",
//       body: formData,
//     })
//       .then((response) => response.json())
//       .then((response) => {
//         if (response.error) {
//           throw Error(response.error);
//         }
//         const formattedData = JSON.stringify(response, null, 2);
//         alert(`${response.titulo}\n${formattedData}`);
//         document.getElementById("registerClient").reset();
//       })
//       .catch((response) => {
//         alert(response);
//         console.log(response);
//       });
//     // .finally((message) => console.log(message)); se precisar finalizar algum carregamento, só fazer no finally
//   });

export function handleFormSubmit(formId, controllerPath) {
  document.querySelector(`#${formId}`).addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(e.target);

    fetch(controllerPath, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((response) => {
        console.log(response);
        if (response.error) {
          throw Error(response.error);
        }
        console.log(response);
        const formattedData = JSON.stringify(response, null, 2);
        alert(`${response.titulo}\n${formattedData}`);
        document.getElementById(formId).reset();
      })
      .catch((response) => {
        alert(response);
        console.log(response);
      });
  });
}

export function handleFormGetSubmit(formId, controllerPath) {
  document.querySelector(`#${formId}`).addEventListener("submit", function (e) {
    e.preventDefault();

    fetch(controllerPath, {
      method: "GET",
    })
      .then((response) => response.json())
      .then((response) => {
        console.log(response);
        if (response.error) {
          throw Error(response.error);
        }
        console.log(response);
        const formattedData = JSON.stringify(response, null, 2);
        alert(`${response.titulo}\n${formattedData}`);
        document.getElementById(formId).reset();
      })
      .catch((response) => {
        alert(response);
        console.log(response);
      });
  });
}
