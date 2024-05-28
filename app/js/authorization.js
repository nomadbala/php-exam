// import { getJson } from "./functions"; // Не работает почему то

async function getJson(url) {
  const response = await fetch(url);

  if (!response.ok) {
    throw new Error(`HTTP error! Status: ${response.status}`);
  }

  const data = await response.json();
  return data;
}

async function sendForm(url, method = "post", formData) {
  let response = await fetch(url, {
    method: method,
    body: JSON.stringify(formData),
    headers: {
      "Content-type": "application/json; charset=utf-8",
    },
  });
  console.log(response);
  let promise = await response.json();
  return promise;
}

const registerBtn = document.querySelector("#register_btn");

const form = document.querySelector("#mainForm");

registerBtn.addEventListener("click", (e) => {
  console.log("qewq");
  e.preventDefault();

  const name = form.querySelector("#name").value;
  const login = form.querySelector("#login").value;
  const email = form.querySelector("#email").value;
  const password = form.querySelector("#password").value;

  // console.log(name);
  // console.log(login);
  // console.log(email);
  // console.log(password);

  let object = {
    name: name,
    login: login,
    email: email,
    password: password,
  };

  sendForm(form.action, form.method, object).then((response) => {
    if (response.response === "OK") {
      // http://localhost:8080/itstep/exam/home
      window.location.href = "http://localhost:8080/itstep/exam/home";
    }
  });

  //   getJson(
  //     `app/api/methods/registrateUser.php?name=${name}&login=${login}&email=${email}&password=${password}`
  //   ).then((response) => {
  //     if (response.response === true) {
  //       alert("Вы успешно зарегестрировались!");
  //     }
  //   });
});
