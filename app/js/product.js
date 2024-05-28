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

const btn = document.querySelector("#addToFavorites");
const elements = document.querySelectorAll(".js-select");

const form = document.querySelector("#mainForm");

btn.addEventListener("click", (e) => {
  e.preventDefault();
  let bookTitle = elements[1].textContent;
  let title = bookTitle.replace(/\s*\([^)]*\)\s*/, "");
  let object = {
    author: elements[0].textContent,
    booktitle: title,
  };
  //   console.log(elements);
  fetch(
    `http://localhost:8080/itstep/exam/app/api/methods/addToFavorites.php?author=${elements[0].textContent}&booktitle=${elements[1].textContent}`.then(
      (res) => {
        if (res.response === "OK") {
          window.location.href = "http://localhost:8080/itstep/exam/home";
        }
      }
    )
  );
});
