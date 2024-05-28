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

const form = document.querySelector("#exitForm");
const exitBtn = form.querySelector("#exit-account-btn");

exitBtn.addEventListener("click", (e) => {
  e.preventDefault();
  let object = {
    name: "currentUser",
  };
  sendForm(form.action, form.method, object).then((response) => {
    if (response.response === "OK") {
      window.location.href = "http://localhost:8080/itstep/exam/home";
    }
  });
});
