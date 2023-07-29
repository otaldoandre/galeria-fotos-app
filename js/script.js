
const output = document.querySelector("output");
let imagesArray = [];

let fileInput = document.getElementById('myarquivo');
let fileImage = document.getElementById('imgid');

fileInput.addEventListener("change", function(event) {
  const file = fileInput.files;
  imagesArray.push(file[0])
  displayImages()
  
  //let fileName = fileInput.files[0].name;
  //fileImage.src="img/" + fileName;
})

function displayImages() {
  let images = ""
  imagesArray.forEach((image, index) => {
    images += `
                <img src="${URL.createObjectURL(image)}" alt="image">  
              `;
  })
  fileImage.style.display = 'none';
  output.innerHTML = images;
}

