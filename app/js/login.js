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

const loginBtn = document.querySelector("#register_btn");

const form = document.querySelector("#mainForm");

loginBtn.addEventListener("click", (e) => {
  console.log("qewq");
  e.preventDefault();

  const login = form.querySelector("#login").value;
  const password = form.querySelector("#password").value;

  let object = {
    login: login,
    password: password,
  };

  sendForm(form.action, form.method, object).then((response) => {
    if (response.response === "OK") {
      // http://localhost:8080/itstep/exam/home
      window.location.href = "http://localhost:8080/itstep/exam/home";
    } else {
      alert("Неверные данные");
    }
  });
});
