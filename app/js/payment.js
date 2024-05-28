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

const period = document.querySelector("#period");

period.addEventListener("input", () => {
  if (period.value.length == 2) {
    period.value += "/";
  }
});

const submitBtn = document.querySelector("#submitBtn");

const form = document.querySelector("#mainForm");

submitBtn.addEventListener("click", () => {
  sendForm(form.action, form.method, {}).then((res) => {
    if (res.response === "OK") {
      window.location.href = "http://localhost:8080/itstep/exam/home";
    }
  });
});
