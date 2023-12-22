let products = null;
fetch("/products.json")
  .then((response) => response.json())
  .then((data) => {
    products = data;
    console.log(products);
    addDataToHTML();
  });

let listproduct = document.querySelector(".listproduct");
function addDataToHTML() {
  products.forEach((product) => {
    let newProduct = document.createElement("a");
    newProduct.href = "/menu/detail.html?id=" + product.id;
    newProduct.classList.add("product", "col-3", "m-2", "p-4");
    newProduct.innerHTML = `
      <img src="${product.image}">
      <h2 class="p-1 pt-5 my-1">${product.name}</h2>
      <h4 class="p-1">${product.price}</h4>
    `;
    listproduct.appendChild(newProduct);
  });
}

function filterProduct(category) {
  selectedCategory = category;
  updateProductList();
}

function updateProductList() {
  listproduct.innerHTML = ""; // Clear existing products

  let filteredProducts =
    selectedCategory === "all"
      ? products
      : products.filter((product) => product.category === selectedCategory);

  filteredProducts.forEach((product) => {
    let newProduct = document.createElement("a");
    newProduct.href = "/menu/detail.html?id=" + product.id;
    newProduct.classList.add("product", "col-3", "m-2", "p-4");
    newProduct.innerHTML = `
      <img src="${product.image}">
      <h2 class="p-1 pt-5 my-1">${product.name}</h2>
      <h4 class="p-1">${product.price}</h4>
    `;
    listproduct.appendChild(newProduct);
  });
}

// Add event listeners to buttons
buttons.addEventListener("click", function (event) {
  if (event.target.tagName === "BUTTON") {
    // Call the filterProduct function with the category from the clicked button
    filterProduct(event.target.getAttribute("data-category"));
  }
});
