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

function elementFromHtml(html) {
  const template = document.createElement("template");
  template.innerHTML = html.trim();
  return template.content.firstElementChild;
}

function createBookCard(id, title, author, coverUrl, year) {
  var li = document.createElement("li");
  var bookCard = document.createElement("a");
  var img = document.createElement("img");
  var content = document.createElement("div");
  var header = document.createElement("header");
  var authorParagraph = document.createElement("p");
  var titleParagraph = document.createElement("p");

  li.classList.add("big-bookcard");
  img.classList.add("bookcard-img");
  content.classList.add("content");
  header.classList.add("content_header");
  authorParagraph.classList.add("content_header-author");
  titleParagraph.classList.add("content_header-book-title");

  img.src = coverUrl;
  img.alt = "";
  authorParagraph.textContent = author;
  titleParagraph.textContent = title;

  bookCard.setAttribute("name", title);
  bookCard.href = `http://localhost:8080/itstep/exam/product?id=${id}`;

  li.append(bookCard);
  header.appendChild(authorParagraph);
  header.appendChild(titleParagraph);
  content.appendChild(header);
  bookCard.appendChild(img);
  bookCard.appendChild(content);

  document.getElementById("book-list").appendChild(li);
}

function UpdateBookCardList(array) {
  document.getElementById("book-list").innerHTML = "";
  array.forEach((e) => {
    createBookCard(
      e["bookId"],
      e["title"],
      e["author"],
      e["coverUrl"],
      e["releaseDate"]
    );
  });
}

function getSortedBooks(author) {
  fetch(
    `http://localhost:8080/itstep/exam/app/api/methods/getSortedBooksByAuthor.php?author=${author}`
  )
    .then((response) => response.json())
    .then((data) => {
      // console.log(JSON.stringify(data));
      UpdateBookCardList(data);
    })
    .catch((error) => console.error("Error fetching and parsing data:", error));
}

let optionsBtns = [];

function createOption(author) {
  const list = document.querySelector("#authors-sort-section-list");
  const option = document.createElement("div");
  const inputRadio = document.createElement("input");
  inputRadio.setAttribute("type", "radio");
  inputRadio.setAttribute("name", "authorsForSort");
  inputRadio.setAttribute("value", author);
  inputRadio.classList.add("js-select");
  optionsBtns.push(inputRadio);
  const label = document.createElement("label");
  label.innerText = author;
  label.classList.add("lb-option");
  option.appendChild(inputRadio);
  option.appendChild(label);
  list.appendChild(option);
}

const filterBtn = document.querySelector("#filter-btn");

filterBtn.addEventListener("click", () => {
  let selectedSort;
  for (const option of optionsBtns) {
    if (option.checked) {
      selectedSort = option.value;
      break;
    }
  }

  getSortedBooks(selectedSort);
});

function loadAuthorsOptions() {
  getJson(
    "http://localhost:8080/itstep/exam/app/api/methods/getAllAuthors"
  ).then((response) => {
    response.forEach((element) => {
      createOption(element["name"]);
    });
  });
}

function loadAllBooks() {
  getJson(
    "http://localhost:8080/itstep/exam/app/api/methods/getAllBooks.php"
  ).then((response) => {
    response.forEach((element) => {
      createBookCard(
        element["bookId"],
        element["title"],
        element["author"],
        element["coverUrl"],
        element["releaseDate"]
      );
    });
  });
}

document.addEventListener("DOMContentLoaded", (e) => {
  e.preventDefault();

  getJson(
    "http://localhost:8080/itstep/exam/app/api/methods/getAllAuthors.php"
  ).then((response) => {
    response.forEach((element) => {
      createOption(element["name"]);
      // console.log(element["name"]);
    });
  });

  loadAllBooks();
});

const resetAllBtn = document.querySelector("#reset-all-btn");

resetAllBtn.addEventListener("click", (e) => {
  e.preventDefault();
  optionsBtns.forEach((e) => {
    e.checked = false;
  });
  document.getElementById("book-list").innerHTML = "";
  loadAllBooks();
});
