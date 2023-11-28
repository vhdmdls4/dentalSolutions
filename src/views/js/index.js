document
  .querySelector("#registerClient")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("../controllers/ClienteController.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((response) => {
        if (response.error) {
          throw Error(response.error);
        }
        const formattedData = JSON.stringify(response, null, 2);
        alert(`${response.titulo}\n${formattedData}`);
        document.getElementById("registerClient").reset();
      })
      .catch((response) => {
        alert(response);
        console.log(response);
      });
    // .finally((message) => console.log(message)); se precisar finalizar algum carregamento, só fazer no finally
  });

/* 
  
  fetch("../controllers/ClienteController.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        if (data.includes("sucesso")) {
          alert(data);
          // alert("Cliente cadastrado com sucesso!");
          var teste = document.getElementById("registerClient").reset();
          console.log(teste);
        }
        if (data.includes("erro")) {
          alert(data);
          // alert("Erro ao cadastrar cliente!");
        }

        // alert(`${data}`);
        //aqui eu quero deixar o texto em vermelho se o cpf for inválido
        // document.getElementById("mensagem").style.color = "red";
        // document.getElementById("mensagem").style.fontStyle = "italic";
        // document.getElementById("mensagem").style.fontWeight = "700";
        // document.getElementById("mensagem").innerHTML = data;
      })
      .catch((error) => {
        console.error(error);
        alert("Erro ao cadastrar cliente!");
      });
  });
      
  */
